<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\ErrorLog\ErrorLogCreateRequest;
use App\Api\Admin\Requests\ErrorLog\ErrorLogDestroyRequest;
use App\Api\Admin\Requests\ErrorLog\ErrorLogQueryRequest;
use App\Api\Admin\Requests\ErrorLog\ErrorLogUpdateRequest;
use App\Api\Admin\Responses\ErrorLog\ErrorLogDestroyResponse;
use App\Api\Admin\Responses\ErrorLog\ErrorLogQueryResponse;
use App\Api\Admin\Responses\ErrorLog\ErrorLogResponse;
use App\Entities\ErrorLogEntity;
use App\Services\ErrorLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class ErrorLogController extends BaseController
{
    #[OA\Post(path: '/errorLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ErrorLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ErrorLogQueryResponse::class))]
    public function query(ErrorLogQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[ErrorLogQueryRequest::getId])) {
                $condition[] = [ErrorLogEntity::getId, '=', $requestData[ErrorLogQueryRequest::getId]];
            }
            if (isset($requestData[ErrorLogQueryRequest::getTime])) {
                $condition[] = [ErrorLogEntity::getTime, '=', $requestData[ErrorLogQueryRequest::getTime]];
            }
            
            $errorLogService = new ErrorLogService;
            $result = $errorLogService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ErrorLogResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new ErrorLogQueryResponse($result);
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

    #[OA\Post(path: '/errorLog/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ErrorLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ErrorLogResponse::class))]
    public function store(ErrorLogCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new ErrorLogEntity($requestData);

            $errorLogService = new ErrorLogService;
            if ($errorLogService->save($input->toEntity())) {
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

    #[OA\Get(path: '/errorLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ErrorLogResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $errorLogService = new ErrorLogService;
            $errorLog = $errorLogService->getOneById($id);
            if (empty($errorLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new ErrorLogResponse($errorLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/errorLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ErrorLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ErrorLogResponse::class))]
    public function update(ErrorLogUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $errorLogService = new ErrorLogService;
            $errorLog = $errorLogService->getOneById($id);
            if (empty($errorLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new ErrorLogEntity($requestData);

            $errorLogService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/errorLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ErrorLogDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ErrorLogDestroyResponse::class))]
    public function destroy(ErrorLogDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $errorLogService = new ErrorLogService;
            if ($errorLogService->removeByIds($requestData['ids'])) {
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
