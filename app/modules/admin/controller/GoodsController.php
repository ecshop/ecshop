<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsEntity;
use app\bundles\goods\service\GoodsBundleService;
use app\modules\admin\request\goods\GoodsCreateRequest;
use app\modules\admin\request\goods\GoodsQueryRequest;
use app\modules\admin\request\goods\GoodsUpdateRequest;
use app\modules\admin\response\goods\GoodsQueryResponse;
use app\modules\admin\response\goods\GoodsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsController extends BaseController
{
    #[OA\Post(path: '/goods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品信息模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsBundleService = new GoodsBundleService();
            $result = $goodsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsResponse();
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

    #[OA\Post(path: '/goods/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsEntity = new GoodsEntity();
            $goodsEntity->loadData($request);

            $goodsBundleService = new GoodsBundleService();
            $insertId = $goodsBundleService->save($goodsEntity->toArray());
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

    #[OA\Get(path: '/goods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品信息模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsBundleService = new GoodsBundleService();
            $goods = $goodsBundleService->getOne($condition);

            if (empty($goods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsResponse();
            $response->loadData($goods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsBundleService = new GoodsBundleService();
            $goods = $goodsBundleService->getById($request['id']);
            if (empty($goods)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsEntity = new GoodsEntity();
            $goodsEntity->loadData($request);

            $goodsBundleService->update($goodsEntity->toArray(), [
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

    #[OA\Delete(path: '/goods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品信息模块'])]
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

            $goodsBundleService = new GoodsBundleService();
            if ($goodsBundleService->remove($condition)) {
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
