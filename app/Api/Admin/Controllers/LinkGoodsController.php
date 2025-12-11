<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\LinkGoods\LinkGoodsCreateRequest;
use App\Api\Admin\Requests\LinkGoods\LinkGoodsDestroyRequest;
use App\Api\Admin\Requests\LinkGoods\LinkGoodsQueryRequest;
use App\Api\Admin\Requests\LinkGoods\LinkGoodsUpdateRequest;
use App\Api\Admin\Responses\LinkGoods\LinkGoodsDestroyResponse;
use App\Api\Admin\Responses\LinkGoods\LinkGoodsQueryResponse;
use App\Api\Admin\Responses\LinkGoods\LinkGoodsResponse;
use App\Entities\LinkGoodsEntity;
use App\Services\LinkGoodsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class LinkGoodsController extends BaseController
{
    #[OA\Post(path: '/linkGoods/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: LinkGoodsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: LinkGoodsQueryResponse::class))]
    public function query(LinkGoodsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[LinkGoodsQueryRequest::getAdminId])) {
                $condition[] = [LinkGoodsEntity::getAdminId, '=', $requestData[LinkGoodsQueryRequest::getAdminId]];
            }
            if (isset($requestData[LinkGoodsQueryRequest::getId])) {
                $condition[] = [LinkGoodsEntity::getId, '=', $requestData[LinkGoodsQueryRequest::getId]];
            }
            
            $linkGoodsService = new LinkGoodsService;
            $result = $linkGoodsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new LinkGoodsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new LinkGoodsQueryResponse($result);
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

    #[OA\Post(path: '/linkGoods/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: LinkGoodsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: LinkGoodsResponse::class))]
    public function store(LinkGoodsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new LinkGoodsEntity($requestData);

            $linkGoodsService = new LinkGoodsService;
            if ($linkGoodsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/linkGoods/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: LinkGoodsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $linkGoodsService = new LinkGoodsService;
            $linkGoods = $linkGoodsService->getOneById($id);
            if (empty($linkGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new LinkGoodsResponse($linkGoods);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/linkGoods/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: LinkGoodsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: LinkGoodsResponse::class))]
    public function update(LinkGoodsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $linkGoodsService = new LinkGoodsService;
            $linkGoods = $linkGoodsService->getOneById($id);
            if (empty($linkGoods)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new LinkGoodsEntity($requestData);

            $linkGoodsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/linkGoods/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: LinkGoodsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: LinkGoodsDestroyResponse::class))]
    public function destroy(LinkGoodsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $linkGoodsService = new LinkGoodsService;
            if ($linkGoodsService->removeByIds($requestData['ids'])) {
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
