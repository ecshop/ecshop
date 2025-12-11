<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\VoteOption\VoteOptionCreateRequest;
use App\Api\Admin\Requests\VoteOption\VoteOptionDestroyRequest;
use App\Api\Admin\Requests\VoteOption\VoteOptionQueryRequest;
use App\Api\Admin\Requests\VoteOption\VoteOptionUpdateRequest;
use App\Api\Admin\Responses\VoteOption\VoteOptionDestroyResponse;
use App\Api\Admin\Responses\VoteOption\VoteOptionQueryResponse;
use App\Api\Admin\Responses\VoteOption\VoteOptionResponse;
use App\Entities\VoteOptionEntity;
use App\Services\VoteOptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class VoteOptionController extends BaseController
{
    #[OA\Post(path: '/voteOption/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteOptionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteOptionQueryResponse::class))]
    public function query(VoteOptionQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[VoteOptionQueryRequest::getOptionId])) {
                $condition[] = [VoteOptionEntity::getOptionId, '=', $requestData[VoteOptionQueryRequest::getOptionId]];
            }
            if (isset($requestData[VoteOptionQueryRequest::getVoteId])) {
                $condition[] = [VoteOptionEntity::getVoteId, '=', $requestData[VoteOptionQueryRequest::getVoteId]];
            }
            
            $voteOptionService = new VoteOptionService;
            $result = $voteOptionService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new VoteOptionResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new VoteOptionQueryResponse($result);
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

    #[OA\Post(path: '/voteOption/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteOptionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteOptionResponse::class))]
    public function store(VoteOptionCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new VoteOptionEntity($requestData);

            $voteOptionService = new VoteOptionService;
            if ($voteOptionService->save($input->toEntity())) {
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

    #[OA\Get(path: '/voteOption/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteOptionResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $voteOptionService = new VoteOptionService;
            $voteOption = $voteOptionService->getOneById($id);
            if (empty($voteOption)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new VoteOptionResponse($voteOption);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/voteOption/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteOptionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteOptionResponse::class))]
    public function update(VoteOptionUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $voteOptionService = new VoteOptionService;
            $voteOption = $voteOptionService->getOneById($id);
            if (empty($voteOption)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new VoteOptionEntity($requestData);

            $voteOptionService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/voteOption/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteOptionDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteOptionDestroyResponse::class))]
    public function destroy(VoteOptionDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $voteOptionService = new VoteOptionService;
            if ($voteOptionService->removeByIds($requestData['ids'])) {
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
