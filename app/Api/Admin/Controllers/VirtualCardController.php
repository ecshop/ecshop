<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\VirtualCard\VirtualCardCreateRequest;
use App\Api\Admin\Requests\VirtualCard\VirtualCardDestroyRequest;
use App\Api\Admin\Requests\VirtualCard\VirtualCardQueryRequest;
use App\Api\Admin\Requests\VirtualCard\VirtualCardUpdateRequest;
use App\Api\Admin\Responses\VirtualCard\VirtualCardDestroyResponse;
use App\Api\Admin\Responses\VirtualCard\VirtualCardQueryResponse;
use App\Api\Admin\Responses\VirtualCard\VirtualCardResponse;
use App\Entities\VirtualCardEntity;
use App\Services\VirtualCardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class VirtualCardController extends BaseController
{
    #[OA\Post(path: '/virtualCard/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VirtualCardQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VirtualCardQueryResponse::class))]
    public function query(VirtualCardQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[VirtualCardQueryRequest::getCardSn])) {
                $condition[] = [VirtualCardEntity::getCardSn, '=', $requestData[VirtualCardQueryRequest::getCardSn]];
            }
            if (isset($requestData[VirtualCardQueryRequest::getGoodsId])) {
                $condition[] = [VirtualCardEntity::getGoodsId, '=', $requestData[VirtualCardQueryRequest::getGoodsId]];
            }
            if (isset($requestData[VirtualCardQueryRequest::getIsSaled])) {
                $condition[] = [VirtualCardEntity::getIsSaled, '=', $requestData[VirtualCardQueryRequest::getIsSaled]];
            }
            if (isset($requestData[VirtualCardQueryRequest::getCardId])) {
                $condition[] = [VirtualCardEntity::getCardId, '=', $requestData[VirtualCardQueryRequest::getCardId]];
            }
            
            $virtualCardService = new VirtualCardService;
            $result = $virtualCardService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new VirtualCardResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new VirtualCardQueryResponse($result);
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

    #[OA\Post(path: '/virtualCard/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VirtualCardCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VirtualCardResponse::class))]
    public function store(VirtualCardCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new VirtualCardEntity($requestData);

            $virtualCardService = new VirtualCardService;
            if ($virtualCardService->save($input->toEntity())) {
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

    #[OA\Get(path: '/virtualCard/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VirtualCardResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $virtualCardService = new VirtualCardService;
            $virtualCard = $virtualCardService->getOneById($id);
            if (empty($virtualCard)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new VirtualCardResponse($virtualCard);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/virtualCard/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VirtualCardUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VirtualCardResponse::class))]
    public function update(VirtualCardUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $virtualCardService = new VirtualCardService;
            $virtualCard = $virtualCardService->getOneById($id);
            if (empty($virtualCard)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new VirtualCardEntity($requestData);

            $virtualCardService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/virtualCard/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VirtualCardDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VirtualCardDestroyResponse::class))]
    public function destroy(VirtualCardDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $virtualCardService = new VirtualCardService;
            if ($virtualCardService->removeByIds($requestData['ids'])) {
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
