<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsCategoryEntity;
use app\bundles\goods\service\GoodsCategoryBundleService;
use app\modules\admin\request\goodsCategory\GoodsCategoryCreateRequest;
use app\modules\admin\request\goodsCategory\GoodsCategoryQueryRequest;
use app\modules\admin\request\goodsCategory\GoodsCategoryUpdateRequest;
use app\modules\admin\response\goodsCategory\GoodsCategoryQueryResponse;
use app\modules\admin\response\goodsCategory\GoodsCategoryResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsCategoryController extends BaseController
{
    #[OA\Post(path: '/goodsCategory/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品分类模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCategoryQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsCategoryQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsCategoryQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsCategoryBundleService = new GoodsCategoryBundleService();
            $result = $goodsCategoryBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsCategoryResponse();
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

    #[OA\Post(path: '/goodsCategory/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品分类模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCategoryCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCategoryCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsCategoryEntity = new GoodsCategoryEntity();
            $goodsCategoryEntity->loadData($request);

            $goodsCategoryBundleService = new GoodsCategoryBundleService();
            $insertId = $goodsCategoryBundleService->save($goodsCategoryEntity->toArray());
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

    #[OA\Get(path: '/goodsCategory/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品分类模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsCategoryResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsCategoryBundleService = new GoodsCategoryBundleService();
            $goodsCategory = $goodsCategoryBundleService->getOne($condition);

            if (empty($goodsCategory)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsCategoryResponse();
            $response->loadData($goodsCategory);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsCategory/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品分类模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCategoryUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCategoryUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsCategoryBundleService = new GoodsCategoryBundleService();
            $goodsCategory = $goodsCategoryBundleService->getById($request['id']);
            if (empty($goodsCategory)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsCategoryEntity = new GoodsCategoryEntity();
            $goodsCategoryEntity->loadData($request);

            $goodsCategoryBundleService->update($goodsCategoryEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsCategory/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品分类模块'])]
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

            $goodsCategoryBundleService = new GoodsCategoryBundleService();
            if ($goodsCategoryBundleService->remove($condition)) {
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
