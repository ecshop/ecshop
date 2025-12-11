<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\SnatchLog\SnatchLogCreateRequest;
use App\Api\Admin\Requests\SnatchLog\SnatchLogDestroyRequest;
use App\Api\Admin\Requests\SnatchLog\SnatchLogQueryRequest;
use App\Api\Admin\Requests\SnatchLog\SnatchLogUpdateRequest;
use App\Api\Admin\Responses\SnatchLog\SnatchLogDestroyResponse;
use App\Api\Admin\Responses\SnatchLog\SnatchLogQueryResponse;
use App\Api\Admin\Responses\SnatchLog\SnatchLogResponse;
use App\Entities\SnatchLogEntity;
use App\Services\SnatchLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class SnatchLogController extends BaseController
{
    #[OA\Post(path: '/snatchLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SnatchLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SnatchLogQueryResponse::class))]
    public function query(SnatchLogQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[SnatchLogQueryRequest::getLogId])) {
                $condition[] = [SnatchLogEntity::getLogId, '=', $requestData[SnatchLogQueryRequest::getLogId]];
            }
            if (isset($requestData[SnatchLogQueryRequest::getSnatchId])) {
                $condition[] = [SnatchLogEntity::getSnatchId, '=', $requestData[SnatchLogQueryRequest::getSnatchId]];
            }
            
            $snatchLogService = new SnatchLogService;
            $result = $snatchLogService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new SnatchLogResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new SnatchLogQueryResponse($result);
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

    #[OA\Post(path: '/snatchLog/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SnatchLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SnatchLogResponse::class))]
    public function store(SnatchLogCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new SnatchLogEntity($requestData);

            $snatchLogService = new SnatchLogService;
            if ($snatchLogService->save($input->toEntity())) {
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

    #[OA\Get(path: '/snatchLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SnatchLogResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $snatchLogService = new SnatchLogService;
            $snatchLog = $snatchLogService->getOneById($id);
            if (empty($snatchLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new SnatchLogResponse($snatchLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/snatchLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SnatchLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SnatchLogResponse::class))]
    public function update(SnatchLogUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $snatchLogService = new SnatchLogService;
            $snatchLog = $snatchLogService->getOneById($id);
            if (empty($snatchLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new SnatchLogEntity($requestData);

            $snatchLogService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/snatchLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SnatchLogDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SnatchLogDestroyResponse::class))]
    public function destroy(SnatchLogDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $snatchLogService = new SnatchLogService;
            if ($snatchLogService->removeByIds($requestData['ids'])) {
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
