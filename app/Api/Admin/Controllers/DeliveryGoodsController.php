<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\DeliveryGoods\DeliveryGoodsCreateRequest;
use App\Api\Admin\Requests\DeliveryGoods\DeliveryGoodsDestroyRequest;
use App\Api\Admin\Requests\DeliveryGoods\DeliveryGoodsQueryRequest;
use App\Api\Admin\Requests\DeliveryGoods\DeliveryGoodsUpdateRequest;
use App\Api\Admin\Responses\DeliveryGoods\DeliveryGoodsDestroyResponse;
use App\Api\Admin\Responses\DeliveryGoods\DeliveryGoodsQueryResponse;
use App\Api\Admin\Responses\DeliveryGoods\DeliveryGoodsResponse;
use App\Entities\DeliveryGoodsEntity;
use App\Services\DeliveryGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class DeliveryGoodsController extends BaseController
{
    #[OA\Post(path: '/deliveryGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryGoodsQueryResponse::class))]
    public function query(DeliveryGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[DeliveryGoodsQueryRequest::getGoodsId])) {
                $condition[] = [DeliveryGoodsEntity::getGoodsId, '=', $requestData[DeliveryGoodsQueryRequest::getGoodsId]];
            }
            if (isset($requestData[DeliveryGoodsQueryRequest::getGoodsId])) {
                $condition[] = [DeliveryGoodsEntity::getGoodsId, '=', $requestData[DeliveryGoodsQueryRequest::getGoodsId]];
            }
            if (isset($requestData[DeliveryGoodsQueryRequest::getRecId])) {
                $condition[] = [DeliveryGoodsEntity::getRecId, '=', $requestData[DeliveryGoodsQueryRequest::getRecId]];
            }
            
            $deliveryGoodsService = new DeliveryGoodsService;
            $result = $deliveryGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new DeliveryGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new DeliveryGoodsQueryResponse($result);
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

    #[OA\Post(path: '/deliveryGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryGoodsResponse::class))]
    public function store(DeliveryGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new DeliveryGoodsEntity($requestData);

            $deliveryGoodsService = new DeliveryGoodsService;
            if ($deliveryGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/deliveryGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $deliveryGoodsService = new DeliveryGoodsService;
            $deliveryGoods = $deliveryGoodsService->getOneById($id);
            if (empty($deliveryGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new DeliveryGoodsResponse($deliveryGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/deliveryGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryGoodsResponse::class))]
    public function update(DeliveryGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $deliveryGoodsService = new DeliveryGoodsService;
            $deliveryGoods = $deliveryGoodsService->getOneById($id);
            if (empty($deliveryGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new DeliveryGoodsEntity($requestData);

            $deliveryGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/deliveryGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryGoodsDestroyResponse::class))]
    public function destroy(DeliveryGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $deliveryGoodsService = new DeliveryGoodsService;
            if ($deliveryGoodsService->removeByIds($requestData['ids'])) {
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
