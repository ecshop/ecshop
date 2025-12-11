<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\FriendLink\FriendLinkCreateRequest;
use App\Api\Admin\Requests\FriendLink\FriendLinkDestroyRequest;
use App\Api\Admin\Requests\FriendLink\FriendLinkQueryRequest;
use App\Api\Admin\Requests\FriendLink\FriendLinkUpdateRequest;
use App\Api\Admin\Responses\FriendLink\FriendLinkDestroyResponse;
use App\Api\Admin\Responses\FriendLink\FriendLinkQueryResponse;
use App\Api\Admin\Responses\FriendLink\FriendLinkResponse;
use App\Entities\FriendLinkEntity;
use App\Services\FriendLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class FriendLinkController extends BaseController
{
    #[OA\Post(path: '/friendLink/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FriendLinkQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FriendLinkQueryResponse::class))]
    public function query(FriendLinkQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[FriendLinkQueryRequest::getLinkId])) {
                $condition[] = [FriendLinkEntity::getLinkId, '=', $requestData[FriendLinkQueryRequest::getLinkId]];
            }
            if (isset($requestData[FriendLinkQueryRequest::getShowOrder])) {
                $condition[] = [FriendLinkEntity::getShowOrder, '=', $requestData[FriendLinkQueryRequest::getShowOrder]];
            }
            
            $friendLinkService = new FriendLinkService;
            $result = $friendLinkService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new FriendLinkResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new FriendLinkQueryResponse($result);
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

    #[OA\Post(path: '/friendLink/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FriendLinkCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FriendLinkResponse::class))]
    public function store(FriendLinkCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new FriendLinkEntity($requestData);

            $friendLinkService = new FriendLinkService;
            if ($friendLinkService->save($input->toEntity())) {
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

    #[OA\Get(path: '/friendLink/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FriendLinkResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $friendLinkService = new FriendLinkService;
            $friendLink = $friendLinkService->getOneById($id);
            if (empty($friendLink)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new FriendLinkResponse($friendLink);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/friendLink/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FriendLinkUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FriendLinkResponse::class))]
    public function update(FriendLinkUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $friendLinkService = new FriendLinkService;
            $friendLink = $friendLinkService->getOneById($id);
            if (empty($friendLink)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new FriendLinkEntity($requestData);

            $friendLinkService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/friendLink/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FriendLinkDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FriendLinkDestroyResponse::class))]
    public function destroy(FriendLinkDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $friendLinkService = new FriendLinkService;
            if ($friendLinkService->removeByIds($requestData['ids'])) {
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
