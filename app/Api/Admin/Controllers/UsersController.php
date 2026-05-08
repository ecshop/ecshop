<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Requests\Users\UsersCreateRequest;
use App\Api\Admin\Requests\Users\UsersDestroyRequest;
use App\Api\Admin\Requests\Users\UsersQueryRequest;
use App\Api\Admin\Requests\Users\UsersUpdateRequest;
use App\Api\Admin\Responses\Users\UsersDestroyResponse;
use App\Api\Admin\Responses\Users\UsersQueryResponse;
use App\Api\Admin\Responses\Users\UsersResponse;
use App\Entities\UsersEntity;
use App\Services\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class UsersController extends BaseController
{
    #[OA\Post(path: '/users/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UsersQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UsersQueryResponse::class))]
    public function query(UsersQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[UsersQueryRequest::getEmail])) {
                $condition[] = [UsersEntity::getEmail, '=', $requestData[UsersQueryRequest::getEmail]];
            }
            if (isset($requestData[UsersQueryRequest::getFlag])) {
                $condition[] = [UsersEntity::getFlag, '=', $requestData[UsersQueryRequest::getFlag]];
            }
            if (isset($requestData[UsersQueryRequest::getParentId])) {
                $condition[] = [UsersEntity::getParentId, '=', $requestData[UsersQueryRequest::getParentId]];
            }
            if (isset($requestData[UsersQueryRequest::getUserId])) {
                $condition[] = [UsersEntity::getUserId, '=', $requestData[UsersQueryRequest::getUserId]];
            }
            if (isset($requestData[UsersQueryRequest::getUserName])) {
                $condition[] = [UsersEntity::getUserName, '=', $requestData[UsersQueryRequest::getUserName]];
            }

            $usersService = new UsersService;
            $result = $usersService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UsersResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new UsersQueryResponse($result);
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

    #[OA\Post(path: '/users/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UsersCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UsersResponse::class))]
    public function store(UsersCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new UsersEntity($requestData);

            $usersService = new UsersService;
            if ($usersService->save($input->toEntity())) {
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

    #[OA\Get(path: '/users/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UsersResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $usersService = new UsersService;
            $users = $usersService->getOneById($id);
            if (empty($users)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new UsersResponse($users);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/users/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UsersUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UsersResponse::class))]
    public function update(UsersUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $usersService = new UsersService;
            $users = $usersService->getOneById($id);
            if (empty($users)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new UsersEntity($requestData);

            $usersService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/users/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UsersDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UsersDestroyResponse::class))]
    public function destroy(UsersDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $usersService = new UsersService;
            if ($usersService->removeByIds($requestData['ids'])) {
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
