<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsTypeAttributeEntity;
use app\bundles\goods\service\GoodsTypeAttributeBundleService;
use app\modules\admin\request\goodsTypeAttribute\GoodsTypeAttributeCreateRequest;
use app\modules\admin\request\goodsTypeAttribute\GoodsTypeAttributeQueryRequest;
use app\modules\admin\request\goodsTypeAttribute\GoodsTypeAttributeUpdateRequest;
use app\modules\admin\response\goodsTypeAttribute\GoodsTypeAttributeQueryResponse;
use app\modules\admin\response\goodsTypeAttribute\GoodsTypeAttributeResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsTypeAttributeController extends BaseController
{
    #[OA\Post(path: '/goodsTypeAttribute/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品属性模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsTypeAttributeQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsTypeAttributeQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsTypeAttributeQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsTypeAttributeBundleService = new GoodsTypeAttributeBundleService;
            $result = $goodsTypeAttributeBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsTypeAttributeResponse;
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

    #[OA\Post(path: '/goodsTypeAttribute/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品属性模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsTypeAttributeCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsTypeAttributeCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsTypeAttributeEntity = new GoodsTypeAttributeEntity;
            $goodsTypeAttributeEntity->loadData($request);

            $goodsTypeAttributeBundleService = new GoodsTypeAttributeBundleService;
            $insertId = $goodsTypeAttributeBundleService->save($goodsTypeAttributeEntity->toArray());
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

    #[OA\Get(path: '/goodsTypeAttribute/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品属性模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsTypeAttributeResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsTypeAttributeBundleService = new GoodsTypeAttributeBundleService;
            $goodsTypeAttribute = $goodsTypeAttributeBundleService->getOne($condition);

            if (empty($goodsTypeAttribute)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsTypeAttributeResponse;
            $response->loadData($goodsTypeAttribute);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsTypeAttribute/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品属性模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsTypeAttributeUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsTypeAttributeUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsTypeAttributeBundleService = new GoodsTypeAttributeBundleService;
            $goodsTypeAttribute = $goodsTypeAttributeBundleService->getById($request['id']);
            if (empty($goodsTypeAttribute)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsTypeAttributeEntity = new GoodsTypeAttributeEntity;
            $goodsTypeAttributeEntity->loadData($request);

            $goodsTypeAttributeBundleService->update($goodsTypeAttributeEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsTypeAttribute/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品属性模块'])]
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

            $goodsTypeAttributeBundleService = new GoodsTypeAttributeBundleService;
            if ($goodsTypeAttributeBundleService->remove($condition)) {
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
