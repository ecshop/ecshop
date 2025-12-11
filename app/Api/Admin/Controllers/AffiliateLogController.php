<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\AffiliateLog\AffiliateLogCreateRequest;
use App\Api\Admin\Requests\AffiliateLog\AffiliateLogDestroyRequest;
use App\Api\Admin\Requests\AffiliateLog\AffiliateLogQueryRequest;
use App\Api\Admin\Requests\AffiliateLog\AffiliateLogUpdateRequest;
use App\Api\Admin\Responses\AffiliateLog\AffiliateLogDestroyResponse;
use App\Api\Admin\Responses\AffiliateLog\AffiliateLogQueryResponse;
use App\Api\Admin\Responses\AffiliateLog\AffiliateLogResponse;
use App\Entities\AffiliateLogEntity;
use App\Services\AffiliateLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class AffiliateLogController extends BaseController
{
    #[OA\Post(path: '/affiliateLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AffiliateLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AffiliateLogQueryResponse::class))]
    public function query(AffiliateLogQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[AffiliateLogQueryRequest::getLogId])) {
                $condition[] = [AffiliateLogEntity::getLogId, '=', $requestData[AffiliateLogQueryRequest::getLogId]];
            }
            
            $affiliateLogService = new AffiliateLogService;
            $result = $affiliateLogService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AffiliateLogResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new AffiliateLogQueryResponse($result);
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

    #[OA\Post(path: '/affiliateLog/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AffiliateLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AffiliateLogResponse::class))]
    public function store(AffiliateLogCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new AffiliateLogEntity($requestData);

            $affiliateLogService = new AffiliateLogService;
            if ($affiliateLogService->save($input->toEntity())) {
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

    #[OA\Get(path: '/affiliateLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AffiliateLogResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $affiliateLogService = new AffiliateLogService;
            $affiliateLog = $affiliateLogService->getOneById($id);
            if (empty($affiliateLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new AffiliateLogResponse($affiliateLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/affiliateLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AffiliateLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AffiliateLogResponse::class))]
    public function update(AffiliateLogUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $affiliateLogService = new AffiliateLogService;
            $affiliateLog = $affiliateLogService->getOneById($id);
            if (empty($affiliateLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new AffiliateLogEntity($requestData);

            $affiliateLogService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/affiliateLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AffiliateLogDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AffiliateLogDestroyResponse::class))]
    public function destroy(AffiliateLogDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $affiliateLogService = new AffiliateLogService;
            if ($affiliateLogService->removeByIds($requestData['ids'])) {
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
