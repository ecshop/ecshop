<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsLinkGoodsEntity;
use app\bundles\goods\service\GoodsLinkGoodsBundleService;
use app\modules\admin\request\goodsLinkGoods\GoodsLinkGoodsCreateRequest;
use app\modules\admin\request\goodsLinkGoods\GoodsLinkGoodsQueryRequest;
use app\modules\admin\request\goodsLinkGoods\GoodsLinkGoodsUpdateRequest;
use app\modules\admin\response\goodsLinkGoods\GoodsLinkGoodsQueryResponse;
use app\modules\admin\response\goodsLinkGoods\GoodsLinkGoodsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsLinkGoodsController extends BaseController
{
    #[OA\Post(path: '/goodsLinkGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsLinkGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsLinkGoodsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsLinkGoodsQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsLinkGoodsBundleService = new GoodsLinkGoodsBundleService;
            $result = $goodsLinkGoodsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsLinkGoodsResponse;
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

    #[OA\Post(path: '/goodsLinkGoods/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsLinkGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsLinkGoodsCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsLinkGoodsEntity = new GoodsLinkGoodsEntity;
            $goodsLinkGoodsEntity->loadData($request);

            $goodsLinkGoodsBundleService = new GoodsLinkGoodsBundleService;
            $insertId = $goodsLinkGoodsBundleService->save($goodsLinkGoodsEntity->toArray());
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

    #[OA\Get(path: '/goodsLinkGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsLinkGoodsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsLinkGoodsBundleService = new GoodsLinkGoodsBundleService;
            $goodsLinkGoods = $goodsLinkGoodsBundleService->getOne($condition);

            if (empty($goodsLinkGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsLinkGoodsResponse;
            $response->loadData($goodsLinkGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsLinkGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsLinkGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsLinkGoodsUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsLinkGoodsBundleService = new GoodsLinkGoodsBundleService;
            $goodsLinkGoods = $goodsLinkGoodsBundleService->getById($request['id']);
            if (empty($goodsLinkGoods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsLinkGoodsEntity = new GoodsLinkGoodsEntity;
            $goodsLinkGoodsEntity->loadData($request);

            $goodsLinkGoodsBundleService->update($goodsLinkGoodsEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsLinkGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品关联模块'])]
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

            $goodsLinkGoodsBundleService = new GoodsLinkGoodsBundleService;
            if ($goodsLinkGoodsBundleService->remove($condition)) {
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
