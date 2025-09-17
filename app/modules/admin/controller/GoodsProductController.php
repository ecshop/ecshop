<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsProductEntity;
use app\bundles\goods\service\GoodsProductBundleService;
use app\modules\admin\request\goodsProduct\GoodsProductCreateRequest;
use app\modules\admin\request\goodsProduct\GoodsProductQueryRequest;
use app\modules\admin\request\goodsProduct\GoodsProductUpdateRequest;
use app\modules\admin\response\goodsProduct\GoodsProductQueryResponse;
use app\modules\admin\response\goodsProduct\GoodsProductResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsProductController extends BaseController
{
    #[OA\Post(path: '/goodsProduct/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品货品模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsProductQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsProductQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsProductQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsProductBundleService = new GoodsProductBundleService();
            $result = $goodsProductBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsProductResponse();
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

    #[OA\Post(path: '/goodsProduct/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品货品模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsProductCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsProductCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsProductEntity = new GoodsProductEntity();
            $goodsProductEntity->loadData($request);

            $goodsProductBundleService = new GoodsProductBundleService();
            $insertId = $goodsProductBundleService->save($goodsProductEntity->toArray());
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

    #[OA\Get(path: '/goodsProduct/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品货品模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsProductResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsProductBundleService = new GoodsProductBundleService();
            $goodsProduct = $goodsProductBundleService->getOne($condition);

            if (empty($goodsProduct)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsProductResponse();
            $response->loadData($goodsProduct);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsProduct/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品货品模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsProductUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsProductUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsProductBundleService = new GoodsProductBundleService();
            $goodsProduct = $goodsProductBundleService->getById($request['id']);
            if (empty($goodsProduct)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsProductEntity = new GoodsProductEntity();
            $goodsProductEntity->loadData($request);

            $goodsProductBundleService->update($goodsProductEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsProduct/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品货品模块'])]
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

            $goodsProductBundleService = new GoodsProductBundleService();
            if ($goodsProductBundleService->remove($condition)) {
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
