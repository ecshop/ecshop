<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\admin\entity\AdminActionEntity;
use app\bundles\admin\service\AdminActionBundleService;
use app\modules\admin\request\adminAction\AdminActionCreateRequest;
use app\modules\admin\request\adminAction\AdminActionQueryRequest;
use app\modules\admin\request\adminAction\AdminActionUpdateRequest;
use app\modules\admin\response\adminAction\AdminActionQueryResponse;
use app\modules\admin\response\adminAction\AdminActionResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdminActionController extends BaseController
{
    #[OA\Post(path: '/adminAction/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['管理员权限模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminActionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminActionQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdminActionQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adminActionBundleService = new AdminActionBundleService;
            $result = $adminActionBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdminActionResponse;
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

    #[OA\Post(path: '/adminAction/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['管理员权限模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminActionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminActionCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminActionEntity = new AdminActionEntity;
            $adminActionEntity->loadData($request);

            $adminActionBundleService = new AdminActionBundleService;
            $insertId = $adminActionBundleService->save($adminActionEntity->toArray());
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

    #[OA\Get(path: '/adminAction/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['管理员权限模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminActionResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adminActionBundleService = new AdminActionBundleService;
            $adminAction = $adminActionBundleService->getOne($condition);

            if (empty($adminAction)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdminActionResponse;
            $response->loadData($adminAction);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adminAction/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['管理员权限模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminActionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminActionUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminActionBundleService = new AdminActionBundleService;
            $adminAction = $adminActionBundleService->getById($request['id']);
            if (empty($adminAction)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adminActionEntity = new AdminActionEntity;
            $adminActionEntity->loadData($request);

            $adminActionBundleService->update($adminActionEntity->toArray(), [
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

    #[OA\Delete(path: '/adminAction/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['管理员权限模块'])]
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

            $adminActionBundleService = new AdminActionBundleService;
            if ($adminActionBundleService->remove($condition)) {
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
