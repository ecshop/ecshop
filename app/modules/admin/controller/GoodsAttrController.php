<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsAttrEntity;
use app\bundles\goods\service\GoodsAttrBundleService;
use app\modules\admin\request\goodsAttr\GoodsAttrCreateRequest;
use app\modules\admin\request\goodsAttr\GoodsAttrQueryRequest;
use app\modules\admin\request\goodsAttr\GoodsAttrUpdateRequest;
use app\modules\admin\response\goodsAttr\GoodsAttrQueryResponse;
use app\modules\admin\response\goodsAttr\GoodsAttrResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsAttrController extends BaseController
{
    #[OA\Post(path: '/goodsAttr/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品属性关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsAttrQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsAttrBundleService = new GoodsAttrBundleService();
            $result = $goodsAttrBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsAttrResponse();
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

    #[OA\Post(path: '/goodsAttr/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品属性关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsAttrCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsAttrEntity = new GoodsAttrEntity();
            $goodsAttrEntity->loadData($request);

            $goodsAttrBundleService = new GoodsAttrBundleService();
            $insertId = $goodsAttrBundleService->save($goodsAttrEntity->toArray());
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

    #[OA\Get(path: '/goodsAttr/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品属性关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsAttrBundleService = new GoodsAttrBundleService();
            $goodsAttr = $goodsAttrBundleService->getOne($condition);

            if (empty($goodsAttr)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsAttrResponse();
            $response->loadData($goodsAttr);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsAttr/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品属性关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsAttrUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsAttrBundleService = new GoodsAttrBundleService();
            $goodsAttr = $goodsAttrBundleService->getById($request['id']);
            if (empty($goodsAttr)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsAttrEntity = new GoodsAttrEntity();
            $goodsAttrEntity->loadData($request);

            $goodsAttrBundleService->update($goodsAttrEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsAttr/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品属性关联模块'])]
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

            $goodsAttrBundleService = new GoodsAttrBundleService();
            if ($goodsAttrBundleService->remove($condition)) {
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
