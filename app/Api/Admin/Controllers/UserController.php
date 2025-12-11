<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\User\UserCreateRequest;
use App\Api\Admin\Requests\User\UserDestroyRequest;
use App\Api\Admin\Requests\User\UserQueryRequest;
use App\Api\Admin\Requests\User\UserUpdateRequest;
use App\Api\Admin\Responses\User\UserDestroyResponse;
use App\Api\Admin\Responses\User\UserQueryResponse;
use App\Api\Admin\Responses\User\UserResponse;
use App\Entities\UserEntity;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class UserController extends BaseController
{
    #[OA\Post(path: '/user/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserQueryResponse::class))]
    public function query(UserQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[UserQueryRequest::getEmail])) {
                $condition[] = [UserEntity::getEmail, '=', $requestData[UserQueryRequest::getEmail]];
            }
            if (isset($requestData[UserQueryRequest::getFlag])) {
                $condition[] = [UserEntity::getFlag, '=', $requestData[UserQueryRequest::getFlag]];
            }
            if (isset($requestData[UserQueryRequest::getParentId])) {
                $condition[] = [UserEntity::getParentId, '=', $requestData[UserQueryRequest::getParentId]];
            }
            if (isset($requestData[UserQueryRequest::getUserId])) {
                $condition[] = [UserEntity::getUserId, '=', $requestData[UserQueryRequest::getUserId]];
            }
            if (isset($requestData[UserQueryRequest::getUserName])) {
                $condition[] = [UserEntity::getUserName, '=', $requestData[UserQueryRequest::getUserName]];
            }
            
            $userService = new UserService;
            $result = $userService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new UserQueryResponse($result);
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

    #[OA\Post(path: '/user/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserResponse::class))]
    public function store(UserCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new UserEntity($requestData);

            $userService = new UserService;
            if ($userService->save($input->toEntity())) {
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

    #[OA\Get(path: '/user/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $userService = new UserService;
            $user = $userService->getOneById($id);
            if (empty($user)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new UserResponse($user);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/user/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserResponse::class))]
    public function update(UserUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $userService = new UserService;
            $user = $userService->getOneById($id);
            if (empty($user)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new UserEntity($requestData);

            $userService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/user/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserDestroyResponse::class))]
    public function destroy(UserDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $userService = new UserService;
            if ($userService->removeByIds($requestData['ids'])) {
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
