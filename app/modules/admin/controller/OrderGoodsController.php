<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\order\entity\OrderGoodsEntity;
use app\bundles\order\service\OrderGoodsBundleService;
use app\modules\admin\request\orderGoods\OrderGoodsCreateRequest;
use app\modules\admin\request\orderGoods\OrderGoodsQueryRequest;
use app\modules\admin\request\orderGoods\OrderGoodsUpdateRequest;
use app\modules\admin\response\orderGoods\OrderGoodsQueryResponse;
use app\modules\admin\response\orderGoods\OrderGoodsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class OrderGoodsController extends BaseController
{
    #[OA\Post(path: '/orderGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['订单商品模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderGoodsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new OrderGoodsQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $orderGoodsBundleService = new OrderGoodsBundleService;
            $result = $orderGoodsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new OrderGoodsResponse;
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

    #[OA\Post(path: '/orderGoods/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['订单商品模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderGoodsCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderGoodsEntity = new OrderGoodsEntity;
            $orderGoodsEntity->loadData($request);

            $orderGoodsBundleService = new OrderGoodsBundleService;
            $insertId = $orderGoodsBundleService->save($orderGoodsEntity->toArray());
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

    #[OA\Get(path: '/orderGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['订单商品模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderGoodsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $orderGoodsBundleService = new OrderGoodsBundleService;
            $orderGoods = $orderGoodsBundleService->getOne($condition);

            if (empty($orderGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new OrderGoodsResponse;
            $response->loadData($orderGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/orderGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['订单商品模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderGoodsUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderGoodsBundleService = new OrderGoodsBundleService;
            $orderGoods = $orderGoodsBundleService->getById($request['id']);
            if (empty($orderGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $orderGoodsEntity = new OrderGoodsEntity;
            $orderGoodsEntity->loadData($request);

            $orderGoodsBundleService->update($orderGoodsEntity->toArray(), [
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

    #[OA\Delete(path: '/orderGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['订单商品模块'])]
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

            $orderGoodsBundleService = new OrderGoodsBundleService;
            if ($orderGoodsBundleService->remove($condition)) {
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
