<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\CollectGoods\CollectGoodsCreateRequest;
use App\Api\Admin\Requests\CollectGoods\CollectGoodsDestroyRequest;
use App\Api\Admin\Requests\CollectGoods\CollectGoodsQueryRequest;
use App\Api\Admin\Requests\CollectGoods\CollectGoodsUpdateRequest;
use App\Api\Admin\Responses\CollectGoods\CollectGoodsDestroyResponse;
use App\Api\Admin\Responses\CollectGoods\CollectGoodsQueryResponse;
use App\Api\Admin\Responses\CollectGoods\CollectGoodsResponse;
use App\Entities\CollectGoodsEntity;
use App\Services\CollectGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class CollectGoodsController extends BaseController
{
    #[OA\Post(path: '/collectGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CollectGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CollectGoodsQueryResponse::class))]
    public function query(CollectGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[CollectGoodsQueryRequest::getGoodsId])) {
                $condition[] = [CollectGoodsEntity::getGoodsId, '=', $requestData[CollectGoodsQueryRequest::getGoodsId]];
            }
            if (isset($requestData[CollectGoodsQueryRequest::getIsAttention])) {
                $condition[] = [CollectGoodsEntity::getIsAttention, '=', $requestData[CollectGoodsQueryRequest::getIsAttention]];
            }
            if (isset($requestData[CollectGoodsQueryRequest::getRecId])) {
                $condition[] = [CollectGoodsEntity::getRecId, '=', $requestData[CollectGoodsQueryRequest::getRecId]];
            }
            if (isset($requestData[CollectGoodsQueryRequest::getUserId])) {
                $condition[] = [CollectGoodsEntity::getUserId, '=', $requestData[CollectGoodsQueryRequest::getUserId]];
            }
            
            $collectGoodsService = new CollectGoodsService;
            $result = $collectGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new CollectGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new CollectGoodsQueryResponse($result);
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

    #[OA\Post(path: '/collectGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CollectGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CollectGoodsResponse::class))]
    public function store(CollectGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new CollectGoodsEntity($requestData);

            $collectGoodsService = new CollectGoodsService;
            if ($collectGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/collectGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CollectGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $collectGoodsService = new CollectGoodsService;
            $collectGoods = $collectGoodsService->getOneById($id);
            if (empty($collectGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new CollectGoodsResponse($collectGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/collectGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CollectGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CollectGoodsResponse::class))]
    public function update(CollectGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $collectGoodsService = new CollectGoodsService;
            $collectGoods = $collectGoodsService->getOneById($id);
            if (empty($collectGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new CollectGoodsEntity($requestData);

            $collectGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/collectGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CollectGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CollectGoodsDestroyResponse::class))]
    public function destroy(CollectGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $collectGoodsService = new CollectGoodsService;
            if ($collectGoodsService->removeByIds($requestData['ids'])) {
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
