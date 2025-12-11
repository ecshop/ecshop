<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\AreaRegion\AreaRegionCreateRequest;
use App\Api\Admin\Requests\AreaRegion\AreaRegionDestroyRequest;
use App\Api\Admin\Requests\AreaRegion\AreaRegionQueryRequest;
use App\Api\Admin\Requests\AreaRegion\AreaRegionUpdateRequest;
use App\Api\Admin\Responses\AreaRegion\AreaRegionDestroyResponse;
use App\Api\Admin\Responses\AreaRegion\AreaRegionQueryResponse;
use App\Api\Admin\Responses\AreaRegion\AreaRegionResponse;
use App\Entities\AreaRegionEntity;
use App\Services\AreaRegionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class AreaRegionController extends BaseController
{
    #[OA\Post(path: '/areaRegion/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AreaRegionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AreaRegionQueryResponse::class))]
    public function query(AreaRegionQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[AreaRegionQueryRequest::getId])) {
                $condition[] = [AreaRegionEntity::getId, '=', $requestData[AreaRegionQueryRequest::getId]];
            }
            if (isset($requestData[AreaRegionQueryRequest::getRegionId])) {
                $condition[] = [AreaRegionEntity::getRegionId, '=', $requestData[AreaRegionQueryRequest::getRegionId]];
            }
            
            $areaRegionService = new AreaRegionService;
            $result = $areaRegionService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AreaRegionResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new AreaRegionQueryResponse($result);
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

    #[OA\Post(path: '/areaRegion/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AreaRegionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AreaRegionResponse::class))]
    public function store(AreaRegionCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new AreaRegionEntity($requestData);

            $areaRegionService = new AreaRegionService;
            if ($areaRegionService->save($input->toEntity())) {
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

    #[OA\Get(path: '/areaRegion/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AreaRegionResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $areaRegionService = new AreaRegionService;
            $areaRegion = $areaRegionService->getOneById($id);
            if (empty($areaRegion)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new AreaRegionResponse($areaRegion);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/areaRegion/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AreaRegionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AreaRegionResponse::class))]
    public function update(AreaRegionUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $areaRegionService = new AreaRegionService;
            $areaRegion = $areaRegionService->getOneById($id);
            if (empty($areaRegion)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new AreaRegionEntity($requestData);

            $areaRegionService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/areaRegion/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AreaRegionDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AreaRegionDestroyResponse::class))]
    public function destroy(AreaRegionDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $areaRegionService = new AreaRegionService;
            if ($areaRegionService->removeByIds($requestData['ids'])) {
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
