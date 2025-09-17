<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopAutoManageEntity;
use app\bundles\shop\service\ShopAutoManageBundleService;
use app\modules\admin\request\shopAutoManage\ShopAutoManageCreateRequest;
use app\modules\admin\request\shopAutoManage\ShopAutoManageQueryRequest;
use app\modules\admin\request\shopAutoManage\ShopAutoManageUpdateRequest;
use app\modules\admin\response\shopAutoManage\ShopAutoManageQueryResponse;
use app\modules\admin\response\shopAutoManage\ShopAutoManageResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopAutoManageController extends BaseController
{
    #[OA\Post(path: '/shopAutoManage/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品自动上下架管理模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopAutoManageQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopAutoManageQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopAutoManageQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopAutoManageBundleService = new ShopAutoManageBundleService();
            $result = $shopAutoManageBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopAutoManageResponse();
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

    #[OA\Post(path: '/shopAutoManage/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品自动上下架管理模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopAutoManageCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopAutoManageCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopAutoManageEntity = new ShopAutoManageEntity();
            $shopAutoManageEntity->loadData($request);

            $shopAutoManageBundleService = new ShopAutoManageBundleService();
            $insertId = $shopAutoManageBundleService->save($shopAutoManageEntity->toArray());
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

    #[OA\Get(path: '/shopAutoManage/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品自动上下架管理模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopAutoManageResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopAutoManageBundleService = new ShopAutoManageBundleService();
            $shopAutoManage = $shopAutoManageBundleService->getOne($condition);

            if (empty($shopAutoManage)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopAutoManageResponse();
            $response->loadData($shopAutoManage);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopAutoManage/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品自动上下架管理模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopAutoManageUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopAutoManageUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopAutoManageBundleService = new ShopAutoManageBundleService();
            $shopAutoManage = $shopAutoManageBundleService->getById($request['id']);
            if (empty($shopAutoManage)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopAutoManageEntity = new ShopAutoManageEntity();
            $shopAutoManageEntity->loadData($request);

            $shopAutoManageBundleService->update($shopAutoManageEntity->toArray(), [
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

    #[OA\Delete(path: '/shopAutoManage/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品自动上下架管理模块'])]
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

            $shopAutoManageBundleService = new ShopAutoManageBundleService();
            if ($shopAutoManageBundleService->remove($condition)) {
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
