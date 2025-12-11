<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\BookingGoods\BookingGoodsCreateRequest;
use App\Api\Admin\Requests\BookingGoods\BookingGoodsDestroyRequest;
use App\Api\Admin\Requests\BookingGoods\BookingGoodsQueryRequest;
use App\Api\Admin\Requests\BookingGoods\BookingGoodsUpdateRequest;
use App\Api\Admin\Responses\BookingGoods\BookingGoodsDestroyResponse;
use App\Api\Admin\Responses\BookingGoods\BookingGoodsQueryResponse;
use App\Api\Admin\Responses\BookingGoods\BookingGoodsResponse;
use App\Entities\BookingGoodsEntity;
use App\Services\BookingGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class BookingGoodsController extends BaseController
{
    #[OA\Post(path: '/bookingGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BookingGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BookingGoodsQueryResponse::class))]
    public function query(BookingGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[BookingGoodsQueryRequest::getRecId])) {
                $condition[] = [BookingGoodsEntity::getRecId, '=', $requestData[BookingGoodsQueryRequest::getRecId]];
            }
            if (isset($requestData[BookingGoodsQueryRequest::getUserId])) {
                $condition[] = [BookingGoodsEntity::getUserId, '=', $requestData[BookingGoodsQueryRequest::getUserId]];
            }
            
            $bookingGoodsService = new BookingGoodsService;
            $result = $bookingGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new BookingGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new BookingGoodsQueryResponse($result);
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

    #[OA\Post(path: '/bookingGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BookingGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BookingGoodsResponse::class))]
    public function store(BookingGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new BookingGoodsEntity($requestData);

            $bookingGoodsService = new BookingGoodsService;
            if ($bookingGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/bookingGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BookingGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $bookingGoodsService = new BookingGoodsService;
            $bookingGoods = $bookingGoodsService->getOneById($id);
            if (empty($bookingGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new BookingGoodsResponse($bookingGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/bookingGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BookingGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BookingGoodsResponse::class))]
    public function update(BookingGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $bookingGoodsService = new BookingGoodsService;
            $bookingGoods = $bookingGoodsService->getOneById($id);
            if (empty($bookingGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new BookingGoodsEntity($requestData);

            $bookingGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/bookingGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: BookingGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: BookingGoodsDestroyResponse::class))]
    public function destroy(BookingGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $bookingGoodsService = new BookingGoodsService;
            if ($bookingGoodsService->removeByIds($requestData['ids'])) {
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
