<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\admin\entity\AdminUserEntity;
use app\bundles\admin\service\AdminUserBundleService;
use app\modules\admin\request\adminUser\AdminUserCreateRequest;
use app\modules\admin\request\adminUser\AdminUserQueryRequest;
use app\modules\admin\request\adminUser\AdminUserUpdateRequest;
use app\modules\admin\response\adminUser\AdminUserQueryResponse;
use app\modules\admin\response\adminUser\AdminUserResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdminUserController extends BaseController
{
    #[OA\Post(path: '/adminUser/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['管理员模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminUserQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminUserQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdminUserQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adminUserBundleService = new AdminUserBundleService;
            $result = $adminUserBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdminUserResponse;
                $response->loadData($item);
                $result['data'][$key] = $response->toArray();
            }

            return $this->success($result);
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('查询列表错误');
        }
    }

    #[OA\Post(path: '/adminUser/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['管理员模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminUserCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminUserCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminUserEntity = new AdminUserEntity;
            $adminUserEntity->loadData($request);

            $adminUserBundleService = new AdminUserBundleService;
            $insertId = $adminUserBundleService->save($adminUserEntity->toArray());
            if ($insertId > 0) {
                DB::commit();

                return $this->success('新增数据成功');
            }

            throw new CustomException('新增数据失败');
        } catch (Throwable $e) {
            DB::rollback();

            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('新增数据错误');
        }
    }

    #[OA\Get(path: '/adminUser/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['管理员模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminUserResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adminUserBundleService = new AdminUserBundleService;
            $adminUser = $adminUserBundleService->getOne($condition);

            if (empty($adminUser)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdminUserResponse;
            $response->loadData($adminUser);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adminUser/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['管理员模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminUserUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminUserUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminUserBundleService = new AdminUserBundleService;
            $adminUser = $adminUserBundleService->getById($request['id']);
            if (empty($adminUser)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adminUserEntity = new AdminUserEntity;
            $adminUserEntity->loadData($request);

            $adminUserBundleService->update($adminUserEntity->toArray(), [
                ['id', '=', $request['id']],
            ]);

            DB::commit();

            return $this->success('更新数据成功');
        } catch (Throwable $e) {
            DB::rollback();

            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('更新数据错误');
        }
    }

    #[OA\Delete(path: '/adminUser/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['管理员模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK')]
    public function destroy(): Response
    {
        DB::startTrans();
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adminUserBundleService = new AdminUserBundleService;
            if ($adminUserBundleService->remove($condition)) {
                DB::commit();

                return $this->success('删除数据成功');
            }

            throw new CustomException('删除数据失败');
        } catch (Throwable $e) {
            DB::rollback();

            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('删除数据错误');
        }
    }
}
