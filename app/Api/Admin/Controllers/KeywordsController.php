<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\Keywords\KeywordsCreateRequest;
use App\Api\Admin\Requests\Keywords\KeywordsDestroyRequest;
use App\Api\Admin\Requests\Keywords\KeywordsQueryRequest;
use App\Api\Admin\Requests\Keywords\KeywordsUpdateRequest;
use App\Api\Admin\Responses\Keywords\KeywordsDestroyResponse;
use App\Api\Admin\Responses\Keywords\KeywordsQueryResponse;
use App\Api\Admin\Responses\Keywords\KeywordsResponse;
use App\Entities\KeywordsEntity;
use App\Services\KeywordsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class KeywordsController extends BaseController
{
    #[OA\Post(path: '/keywords/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: KeywordsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: KeywordsQueryResponse::class))]
    public function query(KeywordsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[KeywordsQueryRequest::getKeyword])) {
                $condition[] = [KeywordsEntity::getKeyword, '=', $requestData[KeywordsQueryRequest::getKeyword]];
            }
            if (isset($requestData[KeywordsQueryRequest::getId])) {
                $condition[] = [KeywordsEntity::getId, '=', $requestData[KeywordsQueryRequest::getId]];
            }
            
            $keywordsService = new KeywordsService;
            $result = $keywordsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new KeywordsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new KeywordsQueryResponse($result);
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

    #[OA\Post(path: '/keywords/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: KeywordsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: KeywordsResponse::class))]
    public function store(KeywordsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new KeywordsEntity($requestData);

            $keywordsService = new KeywordsService;
            if ($keywordsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/keywords/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: KeywordsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $keywordsService = new KeywordsService;
            $keywords = $keywordsService->getOneById($id);
            if (empty($keywords)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new KeywordsResponse($keywords);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/keywords/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: KeywordsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: KeywordsResponse::class))]
    public function update(KeywordsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $keywordsService = new KeywordsService;
            $keywords = $keywordsService->getOneById($id);
            if (empty($keywords)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new KeywordsEntity($requestData);

            $keywordsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/keywords/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: KeywordsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: KeywordsDestroyResponse::class))]
    public function destroy(KeywordsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $keywordsService = new KeywordsService;
            if ($keywordsService->removeByIds($requestData['ids'])) {
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
