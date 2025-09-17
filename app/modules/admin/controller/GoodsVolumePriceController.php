<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsVolumePriceEntity;
use app\bundles\goods\service\GoodsVolumePriceBundleService;
use app\modules\admin\request\goodsVolumePrice\GoodsVolumePriceCreateRequest;
use app\modules\admin\request\goodsVolumePrice\GoodsVolumePriceQueryRequest;
use app\modules\admin\request\goodsVolumePrice\GoodsVolumePriceUpdateRequest;
use app\modules\admin\response\goodsVolumePrice\GoodsVolumePriceQueryResponse;
use app\modules\admin\response\goodsVolumePrice\GoodsVolumePriceResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsVolumePriceController extends BaseController
{
    #[OA\Post(path: '/goodsVolumePrice/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品阶梯价格模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsVolumePriceQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsVolumePriceQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsVolumePriceQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsVolumePriceBundleService = new GoodsVolumePriceBundleService();
            $result = $goodsVolumePriceBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsVolumePriceResponse();
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

    #[OA\Post(path: '/goodsVolumePrice/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品阶梯价格模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsVolumePriceCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsVolumePriceCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsVolumePriceEntity = new GoodsVolumePriceEntity();
            $goodsVolumePriceEntity->loadData($request);

            $goodsVolumePriceBundleService = new GoodsVolumePriceBundleService();
            $insertId = $goodsVolumePriceBundleService->save($goodsVolumePriceEntity->toArray());
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

    #[OA\Get(path: '/goodsVolumePrice/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品阶梯价格模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsVolumePriceResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsVolumePriceBundleService = new GoodsVolumePriceBundleService();
            $goodsVolumePrice = $goodsVolumePriceBundleService->getOne($condition);

            if (empty($goodsVolumePrice)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsVolumePriceResponse();
            $response->loadData($goodsVolumePrice);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsVolumePrice/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品阶梯价格模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsVolumePriceUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsVolumePriceUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsVolumePriceBundleService = new GoodsVolumePriceBundleService();
            $goodsVolumePrice = $goodsVolumePriceBundleService->getById($request['id']);
            if (empty($goodsVolumePrice)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsVolumePriceEntity = new GoodsVolumePriceEntity();
            $goodsVolumePriceEntity->loadData($request);

            $goodsVolumePriceBundleService->update($goodsVolumePriceEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsVolumePrice/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品阶梯价格模块'])]
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

            $goodsVolumePriceBundleService = new GoodsVolumePriceBundleService();
            if ($goodsVolumePriceBundleService->remove($condition)) {
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
