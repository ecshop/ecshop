<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\GroupGoods\GroupGoodsCreateRequest;
use App\Api\Admin\Requests\GroupGoods\GroupGoodsDestroyRequest;
use App\Api\Admin\Requests\GroupGoods\GroupGoodsQueryRequest;
use App\Api\Admin\Requests\GroupGoods\GroupGoodsUpdateRequest;
use App\Api\Admin\Responses\GroupGoods\GroupGoodsDestroyResponse;
use App\Api\Admin\Responses\GroupGoods\GroupGoodsQueryResponse;
use App\Api\Admin\Responses\GroupGoods\GroupGoodsResponse;
use App\Entities\GroupGoodsEntity;
use App\Services\GroupGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class GroupGoodsController extends BaseController
{
    #[OA\Post(path: '/groupGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GroupGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GroupGoodsQueryResponse::class))]
    public function query(GroupGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[GroupGoodsQueryRequest::getAdminId])) {
                $condition[] = [GroupGoodsEntity::getAdminId, '=', $requestData[GroupGoodsQueryRequest::getAdminId]];
            }
            if (isset($requestData[GroupGoodsQueryRequest::getId])) {
                $condition[] = [GroupGoodsEntity::getId, '=', $requestData[GroupGoodsQueryRequest::getId]];
            }
            
            $groupGoodsService = new GroupGoodsService;
            $result = $groupGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GroupGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new GroupGoodsQueryResponse($result);
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

    #[OA\Post(path: '/groupGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GroupGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GroupGoodsResponse::class))]
    public function store(GroupGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new GroupGoodsEntity($requestData);

            $groupGoodsService = new GroupGoodsService;
            if ($groupGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/groupGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GroupGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $groupGoodsService = new GroupGoodsService;
            $groupGoods = $groupGoodsService->getOneById($id);
            if (empty($groupGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new GroupGoodsResponse($groupGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/groupGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GroupGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GroupGoodsResponse::class))]
    public function update(GroupGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $groupGoodsService = new GroupGoodsService;
            $groupGoods = $groupGoodsService->getOneById($id);
            if (empty($groupGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new GroupGoodsEntity($requestData);

            $groupGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/groupGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GroupGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GroupGoodsDestroyResponse::class))]
    public function destroy(GroupGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $groupGoodsService = new GroupGoodsService;
            if ($groupGoodsService->removeByIds($requestData['ids'])) {
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
