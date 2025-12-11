<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Requests\AccountLog\AccountLogCreateRequest;
use App\Api\Admin\Requests\AccountLog\AccountLogDestroyRequest;
use App\Api\Admin\Requests\AccountLog\AccountLogQueryRequest;
use App\Api\Admin\Requests\AccountLog\AccountLogUpdateRequest;
use App\Api\Admin\Responses\AccountLog\AccountLogDestroyResponse;
use App\Api\Admin\Responses\AccountLog\AccountLogQueryResponse;
use App\Api\Admin\Responses\AccountLog\AccountLogResponse;
use App\Entities\AccountLogEntity;
use App\Services\AccountLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class AccountLogController extends BaseController
{
    #[OA\Post(path: '/accountLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AccountLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AccountLogQueryResponse::class))]
    public function query(AccountLogQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[AccountLogQueryRequest::getLogId])) {
                $condition[] = [AccountLogEntity::getLogId, '=', $requestData[AccountLogQueryRequest::getLogId]];
            }
            if (isset($requestData[AccountLogQueryRequest::getUserId])) {
                $condition[] = [AccountLogEntity::getUserId, '=', $requestData[AccountLogQueryRequest::getUserId]];
            }

            $accountLogService = new AccountLogService;
            $result = $accountLogService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AccountLogResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new AccountLogQueryResponse($result);
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

    #[OA\Post(path: '/accountLog/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AccountLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AccountLogResponse::class))]
    public function store(AccountLogCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new AccountLogEntity($requestData);

            $accountLogService = new AccountLogService;
            if ($accountLogService->save($input->toEntity())) {
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

    #[OA\Get(path: '/accountLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AccountLogResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $accountLogService = new AccountLogService;
            $accountLog = $accountLogService->getOneById($id);
            if (empty($accountLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new AccountLogResponse($accountLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/accountLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AccountLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AccountLogResponse::class))]
    public function update(AccountLogUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $accountLogService = new AccountLogService;
            $accountLog = $accountLogService->getOneById($id);
            if (empty($accountLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new AccountLogEntity($requestData);

            $accountLogService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/accountLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AccountLogDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AccountLogDestroyResponse::class))]
    public function destroy(AccountLogDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $accountLogService = new AccountLogService;
            if ($accountLogService->removeByIds($requestData['ids'])) {
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
