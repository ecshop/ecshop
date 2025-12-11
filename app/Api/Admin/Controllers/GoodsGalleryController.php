<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\GoodsGallery\GoodsGalleryCreateRequest;
use App\Api\Admin\Requests\GoodsGallery\GoodsGalleryDestroyRequest;
use App\Api\Admin\Requests\GoodsGallery\GoodsGalleryQueryRequest;
use App\Api\Admin\Requests\GoodsGallery\GoodsGalleryUpdateRequest;
use App\Api\Admin\Responses\GoodsGallery\GoodsGalleryDestroyResponse;
use App\Api\Admin\Responses\GoodsGallery\GoodsGalleryQueryResponse;
use App\Api\Admin\Responses\GoodsGallery\GoodsGalleryResponse;
use App\Entities\GoodsGalleryEntity;
use App\Services\GoodsGalleryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class GoodsGalleryController extends BaseController
{
    #[OA\Post(path: '/goodsGallery/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryQueryResponse::class))]
    public function query(GoodsGalleryQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[GoodsGalleryQueryRequest::getGoodsId])) {
                $condition[] = [GoodsGalleryEntity::getGoodsId, '=', $requestData[GoodsGalleryQueryRequest::getGoodsId]];
            }
            if (isset($requestData[GoodsGalleryQueryRequest::getImgId])) {
                $condition[] = [GoodsGalleryEntity::getImgId, '=', $requestData[GoodsGalleryQueryRequest::getImgId]];
            }
            
            $goodsGalleryService = new GoodsGalleryService;
            $result = $goodsGalleryService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsGalleryResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new GoodsGalleryQueryResponse($result);
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

    #[OA\Post(path: '/goodsGallery/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryResponse::class))]
    public function store(GoodsGalleryCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new GoodsGalleryEntity($requestData);

            $goodsGalleryService = new GoodsGalleryService;
            if ($goodsGalleryService->save($input->toEntity())) {
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

    #[OA\Get(path: '/goodsGallery/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $goodsGalleryService = new GoodsGalleryService;
            $goodsGallery = $goodsGalleryService->getOneById($id);
            if (empty($goodsGallery)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new GoodsGalleryResponse($goodsGallery);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/goodsGallery/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryResponse::class))]
    public function update(GoodsGalleryUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $goodsGalleryService = new GoodsGalleryService;
            $goodsGallery = $goodsGalleryService->getOneById($id);
            if (empty($goodsGallery)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new GoodsGalleryEntity($requestData);

            $goodsGalleryService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/goodsGallery/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryDestroyResponse::class))]
    public function destroy(GoodsGalleryDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $goodsGalleryService = new GoodsGalleryService;
            if ($goodsGalleryService->removeByIds($requestData['ids'])) {
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
