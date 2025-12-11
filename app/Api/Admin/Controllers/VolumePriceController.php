<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\VolumePrice\VolumePriceCreateRequest;
use App\Api\Admin\Requests\VolumePrice\VolumePriceDestroyRequest;
use App\Api\Admin\Requests\VolumePrice\VolumePriceQueryRequest;
use App\Api\Admin\Requests\VolumePrice\VolumePriceUpdateRequest;
use App\Api\Admin\Responses\VolumePrice\VolumePriceDestroyResponse;
use App\Api\Admin\Responses\VolumePrice\VolumePriceQueryResponse;
use App\Api\Admin\Responses\VolumePrice\VolumePriceResponse;
use App\Entities\VolumePriceEntity;
use App\Services\VolumePriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class VolumePriceController extends BaseController
{
    #[OA\Post(path: '/volumePrice/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VolumePriceQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VolumePriceQueryResponse::class))]
    public function query(VolumePriceQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[VolumePriceQueryRequest::getVolumeNumber])) {
                $condition[] = [VolumePriceEntity::getVolumeNumber, '=', $requestData[VolumePriceQueryRequest::getVolumeNumber]];
            }
            if (isset($requestData[VolumePriceQueryRequest::getId])) {
                $condition[] = [VolumePriceEntity::getId, '=', $requestData[VolumePriceQueryRequest::getId]];
            }
            
            $volumePriceService = new VolumePriceService;
            $result = $volumePriceService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new VolumePriceResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new VolumePriceQueryResponse($result);
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

    #[OA\Post(path: '/volumePrice/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VolumePriceCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VolumePriceResponse::class))]
    public function store(VolumePriceCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new VolumePriceEntity($requestData);

            $volumePriceService = new VolumePriceService;
            if ($volumePriceService->save($input->toEntity())) {
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

    #[OA\Get(path: '/volumePrice/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VolumePriceResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $volumePriceService = new VolumePriceService;
            $volumePrice = $volumePriceService->getOneById($id);
            if (empty($volumePrice)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new VolumePriceResponse($volumePrice);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/volumePrice/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VolumePriceUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VolumePriceResponse::class))]
    public function update(VolumePriceUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $volumePriceService = new VolumePriceService;
            $volumePrice = $volumePriceService->getOneById($id);
            if (empty($volumePrice)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new VolumePriceEntity($requestData);

            $volumePriceService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/volumePrice/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VolumePriceDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VolumePriceDestroyResponse::class))]
    public function destroy(VolumePriceDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $volumePriceService = new VolumePriceService;
            if ($volumePriceService->removeByIds($requestData['ids'])) {
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
