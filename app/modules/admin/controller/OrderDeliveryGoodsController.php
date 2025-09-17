<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\order\entity\OrderDeliveryGoodsEntity;
use app\bundles\order\service\OrderDeliveryGoodsBundleService;
use app\modules\admin\request\orderDeliveryGoods\OrderDeliveryGoodsCreateRequest;
use app\modules\admin\request\orderDeliveryGoods\OrderDeliveryGoodsQueryRequest;
use app\modules\admin\request\orderDeliveryGoods\OrderDeliveryGoodsUpdateRequest;
use app\modules\admin\response\orderDeliveryGoods\OrderDeliveryGoodsQueryResponse;
use app\modules\admin\response\orderDeliveryGoods\OrderDeliveryGoodsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class OrderDeliveryGoodsController extends BaseController
{
    #[OA\Post(path: '/orderDeliveryGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['发货商品记录模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderDeliveryGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderDeliveryGoodsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new OrderDeliveryGoodsQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $orderDeliveryGoodsBundleService = new OrderDeliveryGoodsBundleService();
            $result = $orderDeliveryGoodsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new OrderDeliveryGoodsResponse();
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

    #[OA\Post(path: '/orderDeliveryGoods/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['发货商品记录模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderDeliveryGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderDeliveryGoodsCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderDeliveryGoodsEntity = new OrderDeliveryGoodsEntity();
            $orderDeliveryGoodsEntity->loadData($request);

            $orderDeliveryGoodsBundleService = new OrderDeliveryGoodsBundleService();
            $insertId = $orderDeliveryGoodsBundleService->save($orderDeliveryGoodsEntity->toArray());
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

    #[OA\Get(path: '/orderDeliveryGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['发货商品记录模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderDeliveryGoodsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $orderDeliveryGoodsBundleService = new OrderDeliveryGoodsBundleService();
            $orderDeliveryGoods = $orderDeliveryGoodsBundleService->getOne($condition);

            if (empty($orderDeliveryGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new OrderDeliveryGoodsResponse();
            $response->loadData($orderDeliveryGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/orderDeliveryGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['发货商品记录模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderDeliveryGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderDeliveryGoodsUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderDeliveryGoodsBundleService = new OrderDeliveryGoodsBundleService();
            $orderDeliveryGoods = $orderDeliveryGoodsBundleService->getById($request['id']);
            if (empty($orderDeliveryGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $orderDeliveryGoodsEntity = new OrderDeliveryGoodsEntity();
            $orderDeliveryGoodsEntity->loadData($request);

            $orderDeliveryGoodsBundleService->update($orderDeliveryGoodsEntity->toArray(), [
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

    #[OA\Delete(path: '/orderDeliveryGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['发货商品记录模块'])]
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

            $orderDeliveryGoodsBundleService = new OrderDeliveryGoodsBundleService();
            if ($orderDeliveryGoodsBundleService->remove($condition)) {
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
