<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\GoodsAttr\GoodsAttrCreateRequest;
use App\Api\Admin\Requests\GoodsAttr\GoodsAttrDestroyRequest;
use App\Api\Admin\Requests\GoodsAttr\GoodsAttrQueryRequest;
use App\Api\Admin\Requests\GoodsAttr\GoodsAttrUpdateRequest;
use App\Api\Admin\Responses\GoodsAttr\GoodsAttrDestroyResponse;
use App\Api\Admin\Responses\GoodsAttr\GoodsAttrQueryResponse;
use App\Api\Admin\Responses\GoodsAttr\GoodsAttrResponse;
use App\Entities\GoodsAttrEntity;
use App\Services\GoodsAttrService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class GoodsAttrController extends BaseController
{
    #[OA\Post(path: '/goodsAttr/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrQueryResponse::class))]
    public function query(GoodsAttrQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[GoodsAttrQueryRequest::getAttrId])) {
                $condition[] = [GoodsAttrEntity::getAttrId, '=', $requestData[GoodsAttrQueryRequest::getAttrId]];
            }
            if (isset($requestData[GoodsAttrQueryRequest::getGoodsId])) {
                $condition[] = [GoodsAttrEntity::getGoodsId, '=', $requestData[GoodsAttrQueryRequest::getGoodsId]];
            }
            if (isset($requestData[GoodsAttrQueryRequest::getGoodsAttrId])) {
                $condition[] = [GoodsAttrEntity::getGoodsAttrId, '=', $requestData[GoodsAttrQueryRequest::getGoodsAttrId]];
            }
            
            $goodsAttrService = new GoodsAttrService;
            $result = $goodsAttrService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsAttrResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new GoodsAttrQueryResponse($result);
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

    #[OA\Post(path: '/goodsAttr/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrResponse::class))]
    public function store(GoodsAttrCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new GoodsAttrEntity($requestData);

            $goodsAttrService = new GoodsAttrService;
            if ($goodsAttrService->save($input->toEntity())) {
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

    #[OA\Get(path: '/goodsAttr/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $goodsAttrService = new GoodsAttrService;
            $goodsAttr = $goodsAttrService->getOneById($id);
            if (empty($goodsAttr)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new GoodsAttrResponse($goodsAttr);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/goodsAttr/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrResponse::class))]
    public function update(GoodsAttrUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $goodsAttrService = new GoodsAttrService;
            $goodsAttr = $goodsAttrService->getOneById($id);
            if (empty($goodsAttr)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new GoodsAttrEntity($requestData);

            $goodsAttrService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/goodsAttr/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsAttrDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsAttrDestroyResponse::class))]
    public function destroy(GoodsAttrDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $goodsAttrService = new GoodsAttrService;
            if ($goodsAttrService->removeByIds($requestData['ids'])) {
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
