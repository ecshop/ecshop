<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\VoteLog\VoteLogCreateRequest;
use App\Api\Admin\Requests\VoteLog\VoteLogDestroyRequest;
use App\Api\Admin\Requests\VoteLog\VoteLogQueryRequest;
use App\Api\Admin\Requests\VoteLog\VoteLogUpdateRequest;
use App\Api\Admin\Responses\VoteLog\VoteLogDestroyResponse;
use App\Api\Admin\Responses\VoteLog\VoteLogQueryResponse;
use App\Api\Admin\Responses\VoteLog\VoteLogResponse;
use App\Entities\VoteLogEntity;
use App\Services\VoteLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class VoteLogController extends BaseController
{
    #[OA\Post(path: '/voteLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteLogQueryResponse::class))]
    public function query(VoteLogQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[VoteLogQueryRequest::getLogId])) {
                $condition[] = [VoteLogEntity::getLogId, '=', $requestData[VoteLogQueryRequest::getLogId]];
            }
            if (isset($requestData[VoteLogQueryRequest::getVoteId])) {
                $condition[] = [VoteLogEntity::getVoteId, '=', $requestData[VoteLogQueryRequest::getVoteId]];
            }
            
            $voteLogService = new VoteLogService;
            $result = $voteLogService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new VoteLogResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new VoteLogQueryResponse($result);
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

    #[OA\Post(path: '/voteLog/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteLogResponse::class))]
    public function store(VoteLogCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new VoteLogEntity($requestData);

            $voteLogService = new VoteLogService;
            if ($voteLogService->save($input->toEntity())) {
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

    #[OA\Get(path: '/voteLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteLogResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $voteLogService = new VoteLogService;
            $voteLog = $voteLogService->getOneById($id);
            if (empty($voteLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new VoteLogResponse($voteLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/voteLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteLogResponse::class))]
    public function update(VoteLogUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $voteLogService = new VoteLogService;
            $voteLog = $voteLogService->getOneById($id);
            if (empty($voteLog)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new VoteLogEntity($requestData);

            $voteLogService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/voteLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteLogDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteLogDestroyResponse::class))]
    public function destroy(VoteLogDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $voteLogService = new VoteLogService;
            if ($voteLogService->removeByIds($requestData['ids'])) {
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
