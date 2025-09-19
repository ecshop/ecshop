<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\order\entity\OrderActionEntity;
use app\bundles\order\service\OrderActionBundleService;
use app\modules\admin\request\orderAction\OrderActionCreateRequest;
use app\modules\admin\request\orderAction\OrderActionQueryRequest;
use app\modules\admin\request\orderAction\OrderActionUpdateRequest;
use app\modules\admin\response\orderAction\OrderActionQueryResponse;
use app\modules\admin\response\orderAction\OrderActionResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class OrderActionController extends BaseController
{
    #[OA\Post(path: '/orderAction/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['订单操作记录模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderActionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderActionQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new OrderActionQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $orderActionBundleService = new OrderActionBundleService;
            $result = $orderActionBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new OrderActionResponse;
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

    #[OA\Post(path: '/orderAction/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['订单操作记录模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderActionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderActionCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderActionEntity = new OrderActionEntity;
            $orderActionEntity->loadData($request);

            $orderActionBundleService = new OrderActionBundleService;
            $insertId = $orderActionBundleService->save($orderActionEntity->toArray());
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

    #[OA\Get(path: '/orderAction/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['订单操作记录模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderActionResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $orderActionBundleService = new OrderActionBundleService;
            $orderAction = $orderActionBundleService->getOne($condition);

            if (empty($orderAction)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new OrderActionResponse;
            $response->loadData($orderAction);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/orderAction/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['订单操作记录模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderActionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderActionUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderActionBundleService = new OrderActionBundleService;
            $orderAction = $orderActionBundleService->getById($request['id']);
            if (empty($orderAction)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $orderActionEntity = new OrderActionEntity;
            $orderActionEntity->loadData($request);

            $orderActionBundleService->update($orderActionEntity->toArray(), [
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

    #[OA\Delete(path: '/orderAction/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['订单操作记录模块'])]
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

            $orderActionBundleService = new OrderActionBundleService;
            if ($orderActionBundleService->remove($condition)) {
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
