<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\Region\RegionCreateRequest;
use App\Api\Admin\Requests\Region\RegionDestroyRequest;
use App\Api\Admin\Requests\Region\RegionQueryRequest;
use App\Api\Admin\Requests\Region\RegionUpdateRequest;
use App\Api\Admin\Responses\Region\RegionDestroyResponse;
use App\Api\Admin\Responses\Region\RegionQueryResponse;
use App\Api\Admin\Responses\Region\RegionResponse;
use App\Entities\RegionEntity;
use App\Services\RegionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class RegionController extends BaseController
{
    #[OA\Post(path: '/region/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegionQueryResponse::class))]
    public function query(RegionQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[RegionQueryRequest::getAgencyId])) {
                $condition[] = [RegionEntity::getAgencyId, '=', $requestData[RegionQueryRequest::getAgencyId]];
            }
            if (isset($requestData[RegionQueryRequest::getParentId])) {
                $condition[] = [RegionEntity::getParentId, '=', $requestData[RegionQueryRequest::getParentId]];
            }
            if (isset($requestData[RegionQueryRequest::getRegionId])) {
                $condition[] = [RegionEntity::getRegionId, '=', $requestData[RegionQueryRequest::getRegionId]];
            }
            if (isset($requestData[RegionQueryRequest::getRegionType])) {
                $condition[] = [RegionEntity::getRegionType, '=', $requestData[RegionQueryRequest::getRegionType]];
            }
            
            $regionService = new RegionService;
            $result = $regionService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new RegionResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new RegionQueryResponse($result);
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

    #[OA\Post(path: '/region/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegionResponse::class))]
    public function store(RegionCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new RegionEntity($requestData);

            $regionService = new RegionService;
            if ($regionService->save($input->toEntity())) {
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

    #[OA\Get(path: '/region/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegionResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $regionService = new RegionService;
            $region = $regionService->getOneById($id);
            if (empty($region)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new RegionResponse($region);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/region/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegionResponse::class))]
    public function update(RegionUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $regionService = new RegionService;
            $region = $regionService->getOneById($id);
            if (empty($region)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new RegionEntity($requestData);

            $regionService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/region/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegionDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegionDestroyResponse::class))]
    public function destroy(RegionDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $regionService = new RegionService;
            if ($regionService->removeByIds($requestData['ids'])) {
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
