<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\RegExtendInfo\RegExtendInfoCreateRequest;
use App\Api\Admin\Requests\RegExtendInfo\RegExtendInfoDestroyRequest;
use App\Api\Admin\Requests\RegExtendInfo\RegExtendInfoQueryRequest;
use App\Api\Admin\Requests\RegExtendInfo\RegExtendInfoUpdateRequest;
use App\Api\Admin\Responses\RegExtendInfo\RegExtendInfoDestroyResponse;
use App\Api\Admin\Responses\RegExtendInfo\RegExtendInfoQueryResponse;
use App\Api\Admin\Responses\RegExtendInfo\RegExtendInfoResponse;
use App\Entities\RegExtendInfoEntity;
use App\Services\RegExtendInfoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class RegExtendInfoController extends BaseController
{
    #[OA\Post(path: '/regExtendInfo/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegExtendInfoQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegExtendInfoQueryResponse::class))]
    public function query(RegExtendInfoQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[RegExtendInfoQueryRequest::getId])) {
                $condition[] = [RegExtendInfoEntity::getId, '=', $requestData[RegExtendInfoQueryRequest::getId]];
            }
            
            $regExtendInfoService = new RegExtendInfoService;
            $result = $regExtendInfoService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new RegExtendInfoResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new RegExtendInfoQueryResponse($result);
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

    #[OA\Post(path: '/regExtendInfo/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegExtendInfoCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegExtendInfoResponse::class))]
    public function store(RegExtendInfoCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new RegExtendInfoEntity($requestData);

            $regExtendInfoService = new RegExtendInfoService;
            if ($regExtendInfoService->save($input->toEntity())) {
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

    #[OA\Get(path: '/regExtendInfo/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegExtendInfoResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $regExtendInfoService = new RegExtendInfoService;
            $regExtendInfo = $regExtendInfoService->getOneById($id);
            if (empty($regExtendInfo)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new RegExtendInfoResponse($regExtendInfo);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/regExtendInfo/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegExtendInfoUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegExtendInfoResponse::class))]
    public function update(RegExtendInfoUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $regExtendInfoService = new RegExtendInfoService;
            $regExtendInfo = $regExtendInfoService->getOneById($id);
            if (empty($regExtendInfo)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new RegExtendInfoEntity($requestData);

            $regExtendInfoService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/regExtendInfo/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: RegExtendInfoDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: RegExtendInfoDestroyResponse::class))]
    public function destroy(RegExtendInfoDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $regExtendInfoService = new RegExtendInfoService;
            if ($regExtendInfoService->removeByIds($requestData['ids'])) {
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
