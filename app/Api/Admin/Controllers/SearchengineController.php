<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Requests\Searchengine\SearchengineCreateRequest;
use App\Api\Admin\Requests\Searchengine\SearchengineDestroyRequest;
use App\Api\Admin\Requests\Searchengine\SearchengineQueryRequest;
use App\Api\Admin\Requests\Searchengine\SearchengineUpdateRequest;
use App\Api\Admin\Responses\Searchengine\SearchengineDestroyResponse;
use App\Api\Admin\Responses\Searchengine\SearchengineQueryResponse;
use App\Api\Admin\Responses\Searchengine\SearchengineResponse;
use App\Entities\SearchengineEntity;
use App\Services\SearchengineService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class SearchengineController extends BaseController
{
    #[OA\Post(path: '/searchengine/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchengineQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchengineQueryResponse::class))]
    public function query(SearchengineQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[SearchengineQueryRequest::getSearchengine])) {
                $condition[] = [SearchengineEntity::getSearchengine, '=', $requestData[SearchengineQueryRequest::getSearchengine]];
            }
            if (isset($requestData[SearchengineQueryRequest::getId])) {
                $condition[] = [SearchengineEntity::getId, '=', $requestData[SearchengineQueryRequest::getId]];
            }

            $searchengineService = new SearchengineService;
            $result = $searchengineService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new SearchengineResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new SearchengineQueryResponse($result);
            $response->setFirstPageUrl('');
            $response->setLastPageUrl('');
            $response->setLinks([]);
            $response->setPath('');

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::QUERY_ERROR);
        }
    }

    #[OA\Post(path: '/searchengine/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchengineCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchengineResponse::class))]
    public function store(SearchengineCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new SearchengineEntity($requestData);

            $searchengineService = new SearchengineService;
            if ($searchengineService->save($input->toEntity())) {
                DB::commit();

                return $this->success();
            }

            throw new BusinessException(BusinessEnum::CREATE_FAIL);
        } catch (Throwable $e) {
            DB::rollBack();

            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::CREATE_ERROR);
        }
    }

    #[OA\Get(path: '/searchengine/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchengineResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $searchengineService = new SearchengineService;
            $searchengine = $searchengineService->getOneById($id);
            if (empty($searchengine)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new SearchengineResponse($searchengine);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/searchengine/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchengineUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchengineResponse::class))]
    public function update(SearchengineUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $searchengineService = new SearchengineService;
            $searchengine = $searchengineService->getOneById($id);
            if (empty($searchengine)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new SearchengineEntity($requestData);

            $searchengineService->updateById($input->toEntity(), $id);

            DB::commit();

            return $this->success();
        } catch (Throwable $e) {
            DB::rollBack();

            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::UPDATE_ERROR);
        }
    }

    #[OA\Delete(path: '/searchengine/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SearchengineDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SearchengineDestroyResponse::class))]
    public function destroy(SearchengineDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $searchengineService = new SearchengineService;
            if ($searchengineService->removeByIds($requestData['ids'])) {
                DB::commit();

                return $this->success();
            }

            throw new BusinessException(BusinessEnum::DESTROY_FAIL);
        } catch (Throwable $e) {
            DB::rollBack();

            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::DESTROY_ERROR);
        }
    }
}
