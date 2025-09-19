<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\admin\entity\AdminRoleEntity;
use app\bundles\admin\service\AdminRoleBundleService;
use app\modules\admin\request\adminRole\AdminRoleCreateRequest;
use app\modules\admin\request\adminRole\AdminRoleQueryRequest;
use app\modules\admin\request\adminRole\AdminRoleUpdateRequest;
use app\modules\admin\response\adminRole\AdminRoleQueryResponse;
use app\modules\admin\response\adminRole\AdminRoleResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdminRoleController extends BaseController
{
    #[OA\Post(path: '/adminRole/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['角色模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminRoleQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminRoleQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdminRoleQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adminRoleBundleService = new AdminRoleBundleService;
            $result = $adminRoleBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdminRoleResponse;
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

    #[OA\Post(path: '/adminRole/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['角色模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminRoleCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminRoleCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminRoleEntity = new AdminRoleEntity;
            $adminRoleEntity->loadData($request);

            $adminRoleBundleService = new AdminRoleBundleService;
            $insertId = $adminRoleBundleService->save($adminRoleEntity->toArray());
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

    #[OA\Get(path: '/adminRole/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['角色模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminRoleResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adminRoleBundleService = new AdminRoleBundleService;
            $adminRole = $adminRoleBundleService->getOne($condition);

            if (empty($adminRole)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdminRoleResponse;
            $response->loadData($adminRole);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adminRole/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['角色模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminRoleUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminRoleUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminRoleBundleService = new AdminRoleBundleService;
            $adminRole = $adminRoleBundleService->getById($request['id']);
            if (empty($adminRole)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adminRoleEntity = new AdminRoleEntity;
            $adminRoleEntity->loadData($request);

            $adminRoleBundleService->update($adminRoleEntity->toArray(), [
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

    #[OA\Delete(path: '/adminRole/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['角色模块'])]
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

            $adminRoleBundleService = new AdminRoleBundleService;
            if ($adminRoleBundleService->remove($condition)) {
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
