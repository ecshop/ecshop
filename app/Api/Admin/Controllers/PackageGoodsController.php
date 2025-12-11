<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\PackageGoods\PackageGoodsCreateRequest;
use App\Api\Admin\Requests\PackageGoods\PackageGoodsDestroyRequest;
use App\Api\Admin\Requests\PackageGoods\PackageGoodsQueryRequest;
use App\Api\Admin\Requests\PackageGoods\PackageGoodsUpdateRequest;
use App\Api\Admin\Responses\PackageGoods\PackageGoodsDestroyResponse;
use App\Api\Admin\Responses\PackageGoods\PackageGoodsQueryResponse;
use App\Api\Admin\Responses\PackageGoods\PackageGoodsResponse;
use App\Entities\PackageGoodsEntity;
use App\Services\PackageGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class PackageGoodsController extends BaseController
{
    #[OA\Post(path: '/packageGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PackageGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PackageGoodsQueryResponse::class))]
    public function query(PackageGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[PackageGoodsQueryRequest::getProductId])) {
                $condition[] = [PackageGoodsEntity::getProductId, '=', $requestData[PackageGoodsQueryRequest::getProductId]];
            }
            if (isset($requestData[PackageGoodsQueryRequest::getId])) {
                $condition[] = [PackageGoodsEntity::getId, '=', $requestData[PackageGoodsQueryRequest::getId]];
            }
            
            $packageGoodsService = new PackageGoodsService;
            $result = $packageGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new PackageGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new PackageGoodsQueryResponse($result);
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

    #[OA\Post(path: '/packageGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PackageGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PackageGoodsResponse::class))]
    public function store(PackageGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new PackageGoodsEntity($requestData);

            $packageGoodsService = new PackageGoodsService;
            if ($packageGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/packageGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PackageGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $packageGoodsService = new PackageGoodsService;
            $packageGoods = $packageGoodsService->getOneById($id);
            if (empty($packageGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new PackageGoodsResponse($packageGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/packageGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PackageGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PackageGoodsResponse::class))]
    public function update(PackageGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $packageGoodsService = new PackageGoodsService;
            $packageGoods = $packageGoodsService->getOneById($id);
            if (empty($packageGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new PackageGoodsEntity($requestData);

            $packageGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/packageGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PackageGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PackageGoodsDestroyResponse::class))]
    public function destroy(PackageGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $packageGoodsService = new PackageGoodsService;
            if ($packageGoodsService->removeByIds($requestData['ids'])) {
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
