<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\AdminMessage\AdminMessageCreateRequest;
use App\Api\Admin\Requests\AdminMessage\AdminMessageDestroyRequest;
use App\Api\Admin\Requests\AdminMessage\AdminMessageQueryRequest;
use App\Api\Admin\Requests\AdminMessage\AdminMessageUpdateRequest;
use App\Api\Admin\Responses\AdminMessage\AdminMessageDestroyResponse;
use App\Api\Admin\Responses\AdminMessage\AdminMessageQueryResponse;
use App\Api\Admin\Responses\AdminMessage\AdminMessageResponse;
use App\Entities\AdminMessageEntity;
use App\Services\AdminMessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class AdminMessageController extends BaseController
{
    #[OA\Post(path: '/adminMessage/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageQueryResponse::class))]
    public function query(AdminMessageQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[AdminMessageQueryRequest::getMessageId])) {
                $condition[] = [AdminMessageEntity::getMessageId, '=', $requestData[AdminMessageQueryRequest::getMessageId]];
            }
            if (isset($requestData[AdminMessageQueryRequest::getReceiverId])) {
                $condition[] = [AdminMessageEntity::getReceiverId, '=', $requestData[AdminMessageQueryRequest::getReceiverId]];
            }
            if (isset($requestData[AdminMessageQueryRequest::getReceiverId])) {
                $condition[] = [AdminMessageEntity::getReceiverId, '=', $requestData[AdminMessageQueryRequest::getReceiverId]];
            }
            
            $adminMessageService = new AdminMessageService;
            $result = $adminMessageService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdminMessageResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new AdminMessageQueryResponse($result);
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

    #[OA\Post(path: '/adminMessage/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageResponse::class))]
    public function store(AdminMessageCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new AdminMessageEntity($requestData);

            $adminMessageService = new AdminMessageService;
            if ($adminMessageService->save($input->toEntity())) {
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

    #[OA\Get(path: '/adminMessage/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $adminMessageService = new AdminMessageService;
            $adminMessage = $adminMessageService->getOneById($id);
            if (empty($adminMessage)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new AdminMessageResponse($adminMessage);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/adminMessage/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageResponse::class))]
    public function update(AdminMessageUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $adminMessageService = new AdminMessageService;
            $adminMessage = $adminMessageService->getOneById($id);
            if (empty($adminMessage)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new AdminMessageEntity($requestData);

            $adminMessageService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/adminMessage/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageDestroyResponse::class))]
    public function destroy(AdminMessageDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $adminMessageService = new AdminMessageService;
            if ($adminMessageService->removeByIds($requestData['ids'])) {
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
