<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\search\entity\SearchKeywordsEntity;
use app\bundles\search\service\SearchKeywordsBundleService;
use app\modules\admin\request\searchKeywords\SearchKeywordsCreateRequest;
use app\modules\admin\request\searchKeywords\SearchKeywordsQueryRequest;
use app\modules\admin\request\searchKeywords\SearchKeywordsUpdateRequest;
use app\modules\admin\response\searchKeywords\SearchKeywordsQueryResponse;
use app\modules\admin\response\searchKeywords\SearchKeywordsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class SearchKeywordsController extends BaseController
{
    #[OA\Post(path: '/searchKeywords/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['搜索关键词统计模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchKeywordsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchKeywordsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new SearchKeywordsQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $searchKeywordsBundleService = new SearchKeywordsBundleService();
            $result = $searchKeywordsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new SearchKeywordsResponse();
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

    #[OA\Post(path: '/searchKeywords/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['搜索关键词统计模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchKeywordsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new SearchKeywordsCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $searchKeywordsEntity = new SearchKeywordsEntity();
            $searchKeywordsEntity->loadData($request);

            $searchKeywordsBundleService = new SearchKeywordsBundleService();
            $insertId = $searchKeywordsBundleService->save($searchKeywordsEntity->toArray());
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

    #[OA\Get(path: '/searchKeywords/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['搜索关键词统计模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchKeywordsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $searchKeywordsBundleService = new SearchKeywordsBundleService();
            $searchKeywords = $searchKeywordsBundleService->getOne($condition);

            if (empty($searchKeywords)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new SearchKeywordsResponse();
            $response->loadData($searchKeywords);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/searchKeywords/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['搜索关键词统计模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchKeywordsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new SearchKeywordsUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $searchKeywordsBundleService = new SearchKeywordsBundleService();
            $searchKeywords = $searchKeywordsBundleService->getById($request['id']);
            if (empty($searchKeywords)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $searchKeywordsEntity = new SearchKeywordsEntity();
            $searchKeywordsEntity->loadData($request);

            $searchKeywordsBundleService->update($searchKeywordsEntity->toArray(), [
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

    #[OA\Delete(path: '/searchKeywords/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['搜索关键词统计模块'])]
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

            $searchKeywordsBundleService = new SearchKeywordsBundleService();
            if ($searchKeywordsBundleService->remove($condition)) {
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
