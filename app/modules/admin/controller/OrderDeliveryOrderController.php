<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\order\entity\OrderDeliveryOrderEntity;
use app\bundles\order\service\OrderDeliveryOrderBundleService;
use app\modules\admin\request\orderDeliveryOrder\OrderDeliveryOrderCreateRequest;
use app\modules\admin\request\orderDeliveryOrder\OrderDeliveryOrderQueryRequest;
use app\modules\admin\request\orderDeliveryOrder\OrderDeliveryOrderUpdateRequest;
use app\modules\admin\response\orderDeliveryOrder\OrderDeliveryOrderQueryResponse;
use app\modules\admin\response\orderDeliveryOrder\OrderDeliveryOrderResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class OrderDeliveryOrderController extends BaseController
{
    #[OA\Post(path: '/orderDeliveryOrder/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['发货单模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderDeliveryOrderQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderDeliveryOrderQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new OrderDeliveryOrderQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $orderDeliveryOrderBundleService = new OrderDeliveryOrderBundleService;
            $result = $orderDeliveryOrderBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new OrderDeliveryOrderResponse;
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

    #[OA\Post(path: '/orderDeliveryOrder/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['发货单模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderDeliveryOrderCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderDeliveryOrderCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderDeliveryOrderEntity = new OrderDeliveryOrderEntity;
            $orderDeliveryOrderEntity->loadData($request);

            $orderDeliveryOrderBundleService = new OrderDeliveryOrderBundleService;
            $insertId = $orderDeliveryOrderBundleService->save($orderDeliveryOrderEntity->toArray());
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

    #[OA\Get(path: '/orderDeliveryOrder/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['发货单模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderDeliveryOrderResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $orderDeliveryOrderBundleService = new OrderDeliveryOrderBundleService;
            $orderDeliveryOrder = $orderDeliveryOrderBundleService->getOne($condition);

            if (empty($orderDeliveryOrder)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new OrderDeliveryOrderResponse;
            $response->loadData($orderDeliveryOrder);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/orderDeliveryOrder/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['发货单模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderDeliveryOrderUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderDeliveryOrderUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderDeliveryOrderBundleService = new OrderDeliveryOrderBundleService;
            $orderDeliveryOrder = $orderDeliveryOrderBundleService->getById($request['id']);
            if (empty($orderDeliveryOrder)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $orderDeliveryOrderEntity = new OrderDeliveryOrderEntity;
            $orderDeliveryOrderEntity->loadData($request);

            $orderDeliveryOrderBundleService->update($orderDeliveryOrderEntity->toArray(), [
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

    #[OA\Delete(path: '/orderDeliveryOrder/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['发货单模块'])]
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

            $orderDeliveryOrderBundleService = new OrderDeliveryOrderBundleService;
            if ($orderDeliveryOrderBundleService->remove($condition)) {
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
