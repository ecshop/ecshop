<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsArticleEntity;
use app\bundles\goods\service\GoodsArticleBundleService;
use app\modules\admin\request\goodsArticle\GoodsArticleCreateRequest;
use app\modules\admin\request\goodsArticle\GoodsArticleQueryRequest;
use app\modules\admin\request\goodsArticle\GoodsArticleUpdateRequest;
use app\modules\admin\response\goodsArticle\GoodsArticleQueryResponse;
use app\modules\admin\response\goodsArticle\GoodsArticleResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsArticleController extends BaseController
{
    #[OA\Post(path: '/goodsArticle/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品与文章关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsArticleQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsArticleQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsArticleQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsArticleBundleService = new GoodsArticleBundleService;
            $result = $goodsArticleBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsArticleResponse;
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

    #[OA\Post(path: '/goodsArticle/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品与文章关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsArticleCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsArticleCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsArticleEntity = new GoodsArticleEntity;
            $goodsArticleEntity->loadData($request);

            $goodsArticleBundleService = new GoodsArticleBundleService;
            $insertId = $goodsArticleBundleService->save($goodsArticleEntity->toArray());
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

    #[OA\Get(path: '/goodsArticle/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品与文章关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsArticleResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsArticleBundleService = new GoodsArticleBundleService;
            $goodsArticle = $goodsArticleBundleService->getOne($condition);

            if (empty($goodsArticle)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsArticleResponse;
            $response->loadData($goodsArticle);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsArticle/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品与文章关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsArticleUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsArticleUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsArticleBundleService = new GoodsArticleBundleService;
            $goodsArticle = $goodsArticleBundleService->getById($request['id']);
            if (empty($goodsArticle)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsArticleEntity = new GoodsArticleEntity;
            $goodsArticleEntity->loadData($request);

            $goodsArticleBundleService->update($goodsArticleEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsArticle/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品与文章关联模块'])]
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

            $goodsArticleBundleService = new GoodsArticleBundleService;
            if ($goodsArticleBundleService->remove($condition)) {
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
