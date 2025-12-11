<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\ShopConfig\ShopConfigCreateRequest;
use App\Api\Admin\Requests\ShopConfig\ShopConfigDestroyRequest;
use App\Api\Admin\Requests\ShopConfig\ShopConfigQueryRequest;
use App\Api\Admin\Requests\ShopConfig\ShopConfigUpdateRequest;
use App\Api\Admin\Responses\ShopConfig\ShopConfigDestroyResponse;
use App\Api\Admin\Responses\ShopConfig\ShopConfigQueryResponse;
use App\Api\Admin\Responses\ShopConfig\ShopConfigResponse;
use App\Entities\ShopConfigEntity;
use App\Services\ShopConfigService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class ShopConfigController extends BaseController
{
    #[OA\Post(path: '/shopConfig/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigQueryResponse::class))]
    public function query(ShopConfigQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[ShopConfigQueryRequest::getCode])) {
                $condition[] = [ShopConfigEntity::getCode, '=', $requestData[ShopConfigQueryRequest::getCode]];
            }
            if (isset($requestData[ShopConfigQueryRequest::getParentId])) {
                $condition[] = [ShopConfigEntity::getParentId, '=', $requestData[ShopConfigQueryRequest::getParentId]];
            }
            if (isset($requestData[ShopConfigQueryRequest::getId])) {
                $condition[] = [ShopConfigEntity::getId, '=', $requestData[ShopConfigQueryRequest::getId]];
            }
            
            $shopConfigService = new ShopConfigService;
            $result = $shopConfigService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopConfigResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new ShopConfigQueryResponse($result);
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

    #[OA\Post(path: '/shopConfig/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigResponse::class))]
    public function store(ShopConfigCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new ShopConfigEntity($requestData);

            $shopConfigService = new ShopConfigService;
            if ($shopConfigService->save($input->toEntity())) {
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

    #[OA\Get(path: '/shopConfig/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $shopConfigService = new ShopConfigService;
            $shopConfig = $shopConfigService->getOneById($id);
            if (empty($shopConfig)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new ShopConfigResponse($shopConfig);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/shopConfig/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigResponse::class))]
    public function update(ShopConfigUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $shopConfigService = new ShopConfigService;
            $shopConfig = $shopConfigService->getOneById($id);
            if (empty($shopConfig)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new ShopConfigEntity($requestData);

            $shopConfigService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/shopConfig/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigDestroyResponse::class))]
    public function destroy(ShopConfigDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $shopConfigService = new ShopConfigService;
            if ($shopConfigService->removeByIds($requestData['ids'])) {
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
