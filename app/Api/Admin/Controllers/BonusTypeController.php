<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\BonusType\BonusTypeCreateRequest;
use App\Api\Admin\Requests\BonusType\BonusTypeDestroyRequest;
use App\Api\Admin\Requests\BonusType\BonusTypeQueryRequest;
use App\Api\Admin\Requests\BonusType\BonusTypeUpdateRequest;
use App\Api\Admin\Responses\BonusType\BonusTypeDestroyResponse;
use App\Api\Admin\Responses\BonusType\BonusTypeQueryResponse;
use App\Api\Admin\Responses\BonusType\BonusTypeResponse;
use App\Entities\BonusTypeEntity;
use App\Services\BonusTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class BonusTypeController extends BaseController
{
    #[OA\Post(path: '/bonusType/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BonusTypeQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BonusTypeQueryResponse::class))]
    public function query(BonusTypeQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[BonusTypeQueryRequest::getTypeId])) {
                $condition[] = [BonusTypeEntity::getTypeId, '=', $requestData[BonusTypeQueryRequest::getTypeId]];
            }
            
            $bonusTypeService = new BonusTypeService;
            $result = $bonusTypeService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new BonusTypeResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new BonusTypeQueryResponse($result);
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

    #[OA\Post(path: '/bonusType/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BonusTypeCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BonusTypeResponse::class))]
    public function store(BonusTypeCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new BonusTypeEntity($requestData);

            $bonusTypeService = new BonusTypeService;
            if ($bonusTypeService->save($input->toEntity())) {
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

    #[OA\Get(path: '/bonusType/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BonusTypeResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $bonusTypeService = new BonusTypeService;
            $bonusType = $bonusTypeService->getOneById($id);
            if (empty($bonusType)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new BonusTypeResponse($bonusType);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/bonusType/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BonusTypeUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BonusTypeResponse::class))]
    public function update(BonusTypeUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $bonusTypeService = new BonusTypeService;
            $bonusType = $bonusTypeService->getOneById($id);
            if (empty($bonusType)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new BonusTypeEntity($requestData);

            $bonusTypeService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/bonusType/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BonusTypeDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BonusTypeDestroyResponse::class))]
    public function destroy(BonusTypeDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $bonusTypeService = new BonusTypeService;
            if ($bonusTypeService->removeByIds($requestData['ids'])) {
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
