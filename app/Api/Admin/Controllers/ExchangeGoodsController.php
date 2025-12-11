<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\ExchangeGoods\ExchangeGoodsCreateRequest;
use App\Api\Admin\Requests\ExchangeGoods\ExchangeGoodsDestroyRequest;
use App\Api\Admin\Requests\ExchangeGoods\ExchangeGoodsQueryRequest;
use App\Api\Admin\Requests\ExchangeGoods\ExchangeGoodsUpdateRequest;
use App\Api\Admin\Responses\ExchangeGoods\ExchangeGoodsDestroyResponse;
use App\Api\Admin\Responses\ExchangeGoods\ExchangeGoodsQueryResponse;
use App\Api\Admin\Responses\ExchangeGoods\ExchangeGoodsResponse;
use App\Entities\ExchangeGoodsEntity;
use App\Services\ExchangeGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class ExchangeGoodsController extends BaseController
{
    #[OA\Post(path: '/exchangeGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ExchangeGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ExchangeGoodsQueryResponse::class))]
    public function query(ExchangeGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[ExchangeGoodsQueryRequest::getGoodsId])) {
                $condition[] = [ExchangeGoodsEntity::getGoodsId, '=', $requestData[ExchangeGoodsQueryRequest::getGoodsId]];
            }
            if (isset($requestData[ExchangeGoodsQueryRequest::getId])) {
                $condition[] = [ExchangeGoodsEntity::getId, '=', $requestData[ExchangeGoodsQueryRequest::getId]];
            }
            
            $exchangeGoodsService = new ExchangeGoodsService;
            $result = $exchangeGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ExchangeGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new ExchangeGoodsQueryResponse($result);
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

    #[OA\Post(path: '/exchangeGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ExchangeGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ExchangeGoodsResponse::class))]
    public function store(ExchangeGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new ExchangeGoodsEntity($requestData);

            $exchangeGoodsService = new ExchangeGoodsService;
            if ($exchangeGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/exchangeGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ExchangeGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $exchangeGoodsService = new ExchangeGoodsService;
            $exchangeGoods = $exchangeGoodsService->getOneById($id);
            if (empty($exchangeGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new ExchangeGoodsResponse($exchangeGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/exchangeGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ExchangeGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ExchangeGoodsResponse::class))]
    public function update(ExchangeGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $exchangeGoodsService = new ExchangeGoodsService;
            $exchangeGoods = $exchangeGoodsService->getOneById($id);
            if (empty($exchangeGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new ExchangeGoodsEntity($requestData);

            $exchangeGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/exchangeGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ExchangeGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ExchangeGoodsDestroyResponse::class))]
    public function destroy(ExchangeGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $exchangeGoodsService = new ExchangeGoodsService;
            if ($exchangeGoodsService->removeByIds($requestData['ids'])) {
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
