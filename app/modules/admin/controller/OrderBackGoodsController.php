<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\order\entity\OrderBackGoodsEntity;
use app\bundles\order\service\OrderBackGoodsBundleService;
use app\modules\admin\request\orderBackGoods\OrderBackGoodsCreateRequest;
use app\modules\admin\request\orderBackGoods\OrderBackGoodsQueryRequest;
use app\modules\admin\request\orderBackGoods\OrderBackGoodsUpdateRequest;
use app\modules\admin\response\orderBackGoods\OrderBackGoodsQueryResponse;
use app\modules\admin\response\orderBackGoods\OrderBackGoodsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class OrderBackGoodsController extends BaseController
{
    #[OA\Post(path: '/orderBackGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['退货商品记录模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderBackGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderBackGoodsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new OrderBackGoodsQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $orderBackGoodsBundleService = new OrderBackGoodsBundleService();
            $result = $orderBackGoodsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new OrderBackGoodsResponse();
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

    #[OA\Post(path: '/orderBackGoods/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['退货商品记录模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderBackGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderBackGoodsCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderBackGoodsEntity = new OrderBackGoodsEntity();
            $orderBackGoodsEntity->loadData($request);

            $orderBackGoodsBundleService = new OrderBackGoodsBundleService();
            $insertId = $orderBackGoodsBundleService->save($orderBackGoodsEntity->toArray());
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

    #[OA\Get(path: '/orderBackGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['退货商品记录模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: OrderBackGoodsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $orderBackGoodsBundleService = new OrderBackGoodsBundleService();
            $orderBackGoods = $orderBackGoodsBundleService->getOne($condition);

            if (empty($orderBackGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new OrderBackGoodsResponse();
            $response->loadData($orderBackGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/orderBackGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['退货商品记录模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: OrderBackGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new OrderBackGoodsUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $orderBackGoodsBundleService = new OrderBackGoodsBundleService();
            $orderBackGoods = $orderBackGoodsBundleService->getById($request['id']);
            if (empty($orderBackGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $orderBackGoodsEntity = new OrderBackGoodsEntity();
            $orderBackGoodsEntity->loadData($request);

            $orderBackGoodsBundleService->update($orderBackGoodsEntity->toArray(), [
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

    #[OA\Delete(path: '/orderBackGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['退货商品记录模块'])]
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

            $orderBackGoodsBundleService = new OrderBackGoodsBundleService();
            if ($orderBackGoodsBundleService->remove($condition)) {
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
