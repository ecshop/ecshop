<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\article\entity\ArticleCatEntity;
use app\bundles\article\service\ArticleCatBundleService;
use app\modules\admin\request\articleCat\ArticleCatCreateRequest;
use app\modules\admin\request\articleCat\ArticleCatQueryRequest;
use app\modules\admin\request\articleCat\ArticleCatUpdateRequest;
use app\modules\admin\response\articleCat\ArticleCatQueryResponse;
use app\modules\admin\response\articleCat\ArticleCatResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ArticleCatController extends BaseController
{
    #[OA\Post(path: '/articleCat/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['文章分类模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ArticleCatQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ArticleCatQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ArticleCatQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $articleCatBundleService = new ArticleCatBundleService;
            $result = $articleCatBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ArticleCatResponse;
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

    #[OA\Post(path: '/articleCat/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['文章分类模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ArticleCatCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ArticleCatCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $articleCatEntity = new ArticleCatEntity;
            $articleCatEntity->loadData($request);

            $articleCatBundleService = new ArticleCatBundleService;
            $insertId = $articleCatBundleService->save($articleCatEntity->toArray());
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

    #[OA\Get(path: '/articleCat/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['文章分类模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ArticleCatResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $articleCatBundleService = new ArticleCatBundleService;
            $articleCat = $articleCatBundleService->getOne($condition);

            if (empty($articleCat)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ArticleCatResponse;
            $response->loadData($articleCat);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/articleCat/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['文章分类模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ArticleCatUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ArticleCatUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $articleCatBundleService = new ArticleCatBundleService;
            $articleCat = $articleCatBundleService->getById($request['id']);
            if (empty($articleCat)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $articleCatEntity = new ArticleCatEntity;
            $articleCatEntity->loadData($request);

            $articleCatBundleService->update($articleCatEntity->toArray(), [
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

    #[OA\Delete(path: '/articleCat/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['文章分类模块'])]
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

            $articleCatBundleService = new ArticleCatBundleService;
            if ($articleCatBundleService->remove($condition)) {
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
