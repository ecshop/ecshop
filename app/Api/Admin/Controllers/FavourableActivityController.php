<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\FavourableActivity\FavourableActivityCreateRequest;
use App\Api\Admin\Requests\FavourableActivity\FavourableActivityDestroyRequest;
use App\Api\Admin\Requests\FavourableActivity\FavourableActivityQueryRequest;
use App\Api\Admin\Requests\FavourableActivity\FavourableActivityUpdateRequest;
use App\Api\Admin\Responses\FavourableActivity\FavourableActivityDestroyResponse;
use App\Api\Admin\Responses\FavourableActivity\FavourableActivityQueryResponse;
use App\Api\Admin\Responses\FavourableActivity\FavourableActivityResponse;
use App\Entities\FavourableActivityEntity;
use App\Services\FavourableActivityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class FavourableActivityController extends BaseController
{
    #[OA\Post(path: '/favourableActivity/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FavourableActivityQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FavourableActivityQueryResponse::class))]
    public function query(FavourableActivityQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[FavourableActivityQueryRequest::getActName])) {
                $condition[] = [FavourableActivityEntity::getActName, '=', $requestData[FavourableActivityQueryRequest::getActName]];
            }
            if (isset($requestData[FavourableActivityQueryRequest::getActId])) {
                $condition[] = [FavourableActivityEntity::getActId, '=', $requestData[FavourableActivityQueryRequest::getActId]];
            }
            
            $favourableActivityService = new FavourableActivityService;
            $result = $favourableActivityService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new FavourableActivityResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new FavourableActivityQueryResponse($result);
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

    #[OA\Post(path: '/favourableActivity/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FavourableActivityCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FavourableActivityResponse::class))]
    public function store(FavourableActivityCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new FavourableActivityEntity($requestData);

            $favourableActivityService = new FavourableActivityService;
            if ($favourableActivityService->save($input->toEntity())) {
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

    #[OA\Get(path: '/favourableActivity/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FavourableActivityResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $favourableActivityService = new FavourableActivityService;
            $favourableActivity = $favourableActivityService->getOneById($id);
            if (empty($favourableActivity)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new FavourableActivityResponse($favourableActivity);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/favourableActivity/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FavourableActivityUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FavourableActivityResponse::class))]
    public function update(FavourableActivityUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $favourableActivityService = new FavourableActivityService;
            $favourableActivity = $favourableActivityService->getOneById($id);
            if (empty($favourableActivity)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new FavourableActivityEntity($requestData);

            $favourableActivityService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/favourableActivity/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: FavourableActivityDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: FavourableActivityDestroyResponse::class))]
    public function destroy(FavourableActivityDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $favourableActivityService = new FavourableActivityService;
            if ($favourableActivityService->removeByIds($requestData['ids'])) {
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
