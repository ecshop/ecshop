<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\DeliveryOrder\DeliveryOrderCreateRequest;
use App\Api\Admin\Requests\DeliveryOrder\DeliveryOrderDestroyRequest;
use App\Api\Admin\Requests\DeliveryOrder\DeliveryOrderQueryRequest;
use App\Api\Admin\Requests\DeliveryOrder\DeliveryOrderUpdateRequest;
use App\Api\Admin\Responses\DeliveryOrder\DeliveryOrderDestroyResponse;
use App\Api\Admin\Responses\DeliveryOrder\DeliveryOrderQueryResponse;
use App\Api\Admin\Responses\DeliveryOrder\DeliveryOrderResponse;
use App\Entities\DeliveryOrderEntity;
use App\Services\DeliveryOrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class DeliveryOrderController extends BaseController
{
    #[OA\Post(path: '/deliveryOrder/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryOrderQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryOrderQueryResponse::class))]
    public function query(DeliveryOrderQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[DeliveryOrderQueryRequest::getOrderId])) {
                $condition[] = [DeliveryOrderEntity::getOrderId, '=', $requestData[DeliveryOrderQueryRequest::getOrderId]];
            }
            if (isset($requestData[DeliveryOrderQueryRequest::getDeliveryId])) {
                $condition[] = [DeliveryOrderEntity::getDeliveryId, '=', $requestData[DeliveryOrderQueryRequest::getDeliveryId]];
            }
            if (isset($requestData[DeliveryOrderQueryRequest::getUserId])) {
                $condition[] = [DeliveryOrderEntity::getUserId, '=', $requestData[DeliveryOrderQueryRequest::getUserId]];
            }
            
            $deliveryOrderService = new DeliveryOrderService;
            $result = $deliveryOrderService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new DeliveryOrderResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new DeliveryOrderQueryResponse($result);
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

    #[OA\Post(path: '/deliveryOrder/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryOrderCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryOrderResponse::class))]
    public function store(DeliveryOrderCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new DeliveryOrderEntity($requestData);

            $deliveryOrderService = new DeliveryOrderService;
            if ($deliveryOrderService->save($input->toEntity())) {
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

    #[OA\Get(path: '/deliveryOrder/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryOrderResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $deliveryOrderService = new DeliveryOrderService;
            $deliveryOrder = $deliveryOrderService->getOneById($id);
            if (empty($deliveryOrder)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new DeliveryOrderResponse($deliveryOrder);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/deliveryOrder/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryOrderUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryOrderResponse::class))]
    public function update(DeliveryOrderUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $deliveryOrderService = new DeliveryOrderService;
            $deliveryOrder = $deliveryOrderService->getOneById($id);
            if (empty($deliveryOrder)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new DeliveryOrderEntity($requestData);

            $deliveryOrderService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/deliveryOrder/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: DeliveryOrderDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: DeliveryOrderDestroyResponse::class))]
    public function destroy(DeliveryOrderDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $deliveryOrderService = new DeliveryOrderService;
            if ($deliveryOrderService->removeByIds($requestData['ids'])) {
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
