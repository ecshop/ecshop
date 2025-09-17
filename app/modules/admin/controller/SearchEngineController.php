<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\search\entity\SearchEngineEntity;
use app\bundles\search\service\SearchEngineBundleService;
use app\modules\admin\request\searchEngine\SearchEngineCreateRequest;
use app\modules\admin\request\searchEngine\SearchEngineQueryRequest;
use app\modules\admin\request\searchEngine\SearchEngineUpdateRequest;
use app\modules\admin\response\searchEngine\SearchEngineQueryResponse;
use app\modules\admin\response\searchEngine\SearchEngineResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class SearchEngineController extends BaseController
{
    #[OA\Post(path: '/searchEngine/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['搜索引擎访问统计模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchEngineQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchEngineQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new SearchEngineQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $searchEngineBundleService = new SearchEngineBundleService();
            $result = $searchEngineBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new SearchEngineResponse();
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

    #[OA\Post(path: '/searchEngine/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['搜索引擎访问统计模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchEngineCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new SearchEngineCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $searchEngineEntity = new SearchEngineEntity();
            $searchEngineEntity->loadData($request);

            $searchEngineBundleService = new SearchEngineBundleService();
            $insertId = $searchEngineBundleService->save($searchEngineEntity->toArray());
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

    #[OA\Get(path: '/searchEngine/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['搜索引擎访问统计模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchEngineResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $searchEngineBundleService = new SearchEngineBundleService();
            $searchEngine = $searchEngineBundleService->getOne($condition);

            if (empty($searchEngine)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new SearchEngineResponse();
            $response->loadData($searchEngine);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/searchEngine/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['搜索引擎访问统计模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchEngineUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new SearchEngineUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $searchEngineBundleService = new SearchEngineBundleService();
            $searchEngine = $searchEngineBundleService->getById($request['id']);
            if (empty($searchEngine)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $searchEngineEntity = new SearchEngineEntity();
            $searchEngineEntity->loadData($request);

            $searchEngineBundleService->update($searchEngineEntity->toArray(), [
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

    #[OA\Delete(path: '/searchEngine/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['搜索引擎访问统计模块'])]
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

            $searchEngineBundleService = new SearchEngineBundleService();
            if ($searchEngineBundleService->remove($condition)) {
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
