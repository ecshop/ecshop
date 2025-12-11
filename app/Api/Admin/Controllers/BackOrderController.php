<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\BackOrder\BackOrderCreateRequest;
use App\Api\Admin\Requests\BackOrder\BackOrderDestroyRequest;
use App\Api\Admin\Requests\BackOrder\BackOrderQueryRequest;
use App\Api\Admin\Requests\BackOrder\BackOrderUpdateRequest;
use App\Api\Admin\Responses\BackOrder\BackOrderDestroyResponse;
use App\Api\Admin\Responses\BackOrder\BackOrderQueryResponse;
use App\Api\Admin\Responses\BackOrder\BackOrderResponse;
use App\Entities\BackOrderEntity;
use App\Services\BackOrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class BackOrderController extends BaseController
{
    #[OA\Post(path: '/backOrder/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackOrderQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackOrderQueryResponse::class))]
    public function query(BackOrderQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[BackOrderQueryRequest::getOrderId])) {
                $condition[] = [BackOrderEntity::getOrderId, '=', $requestData[BackOrderQueryRequest::getOrderId]];
            }
            if (isset($requestData[BackOrderQueryRequest::getBackId])) {
                $condition[] = [BackOrderEntity::getBackId, '=', $requestData[BackOrderQueryRequest::getBackId]];
            }
            if (isset($requestData[BackOrderQueryRequest::getUserId])) {
                $condition[] = [BackOrderEntity::getUserId, '=', $requestData[BackOrderQueryRequest::getUserId]];
            }
            
            $backOrderService = new BackOrderService;
            $result = $backOrderService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new BackOrderResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new BackOrderQueryResponse($result);
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

    #[OA\Post(path: '/backOrder/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackOrderCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackOrderResponse::class))]
    public function store(BackOrderCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new BackOrderEntity($requestData);

            $backOrderService = new BackOrderService;
            if ($backOrderService->save($input->toEntity())) {
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

    #[OA\Get(path: '/backOrder/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackOrderResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $backOrderService = new BackOrderService;
            $backOrder = $backOrderService->getOneById($id);
            if (empty($backOrder)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new BackOrderResponse($backOrder);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/backOrder/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackOrderUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackOrderResponse::class))]
    public function update(BackOrderUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $backOrderService = new BackOrderService;
            $backOrder = $backOrderService->getOneById($id);
            if (empty($backOrder)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new BackOrderEntity($requestData);

            $backOrderService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/backOrder/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackOrderDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackOrderDestroyResponse::class))]
    public function destroy(BackOrderDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $backOrderService = new BackOrderService;
            if ($backOrderService->removeByIds($requestData['ids'])) {
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
