<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\order\entity\OrderInfoEntity;
use app\bundles\order\service\OrderInfoBundleService;
use app\modules\admin\request\orderInfo\OrderInfoCreateRequest;
use app\modules\admin\request\orderInfo\OrderInfoQueryRequest;
use app\modules\admin\request\orderInfo\OrderInfoUpdateRequest;
use app\modules\admin\response\orderInfo\OrderInfoQueryResponse;
use app\modules\admin\response\orderInfo\OrderInfoResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class OrderInfoController extends BaseController
{
    #[OA\Post(path: '/orderInfo/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['订单信息模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderInfoQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderInfoQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new OrderInfoQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $orderInfoBundleService = new OrderInfoBundleService;
            $result = $orderInfoBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new OrderInfoResponse;
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

    #[OA\Post(path: '/orderInfo/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['订单信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderInfoCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderInfoCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderInfoEntity = new OrderInfoEntity;
            $orderInfoEntity->loadData($request);

            $orderInfoBundleService = new OrderInfoBundleService;
            $insertId = $orderInfoBundleService->save($orderInfoEntity->toArray());
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

    #[OA\Get(path: '/orderInfo/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['订单信息模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderInfoResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $orderInfoBundleService = new OrderInfoBundleService;
            $orderInfo = $orderInfoBundleService->getOne($condition);

            if (empty($orderInfo)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new OrderInfoResponse;
            $response->loadData($orderInfo);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/orderInfo/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['订单信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderInfoUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderInfoUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderInfoBundleService = new OrderInfoBundleService;
            $orderInfo = $orderInfoBundleService->getById($request['id']);
            if (empty($orderInfo)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $orderInfoEntity = new OrderInfoEntity;
            $orderInfoEntity->loadData($request);

            $orderInfoBundleService->update($orderInfoEntity->toArray(), [
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

    #[OA\Delete(path: '/orderInfo/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['订单信息模块'])]
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

            $orderInfoBundleService = new OrderInfoBundleService;
            if ($orderInfoBundleService->remove($condition)) {
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
