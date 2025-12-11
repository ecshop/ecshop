<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\BackGoods\BackGoodsCreateRequest;
use App\Api\Admin\Requests\BackGoods\BackGoodsDestroyRequest;
use App\Api\Admin\Requests\BackGoods\BackGoodsQueryRequest;
use App\Api\Admin\Requests\BackGoods\BackGoodsUpdateRequest;
use App\Api\Admin\Responses\BackGoods\BackGoodsDestroyResponse;
use App\Api\Admin\Responses\BackGoods\BackGoodsQueryResponse;
use App\Api\Admin\Responses\BackGoods\BackGoodsResponse;
use App\Entities\BackGoodsEntity;
use App\Services\BackGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class BackGoodsController extends BaseController
{
    #[OA\Post(path: '/backGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackGoodsQueryResponse::class))]
    public function query(BackGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[BackGoodsQueryRequest::getBackId])) {
                $condition[] = [BackGoodsEntity::getBackId, '=', $requestData[BackGoodsQueryRequest::getBackId]];
            }
            if (isset($requestData[BackGoodsQueryRequest::getGoodsId])) {
                $condition[] = [BackGoodsEntity::getGoodsId, '=', $requestData[BackGoodsQueryRequest::getGoodsId]];
            }
            if (isset($requestData[BackGoodsQueryRequest::getRecId])) {
                $condition[] = [BackGoodsEntity::getRecId, '=', $requestData[BackGoodsQueryRequest::getRecId]];
            }
            
            $backGoodsService = new BackGoodsService;
            $result = $backGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new BackGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new BackGoodsQueryResponse($result);
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

    #[OA\Post(path: '/backGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackGoodsResponse::class))]
    public function store(BackGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new BackGoodsEntity($requestData);

            $backGoodsService = new BackGoodsService;
            if ($backGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/backGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $backGoodsService = new BackGoodsService;
            $backGoods = $backGoodsService->getOneById($id);
            if (empty($backGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new BackGoodsResponse($backGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/backGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackGoodsResponse::class))]
    public function update(BackGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $backGoodsService = new BackGoodsService;
            $backGoods = $backGoodsService->getOneById($id);
            if (empty($backGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new BackGoodsEntity($requestData);

            $backGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/backGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BackGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BackGoodsDestroyResponse::class))]
    public function destroy(BackGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $backGoodsService = new BackGoodsService;
            if ($backGoodsService->removeByIds($requestData['ids'])) {
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
