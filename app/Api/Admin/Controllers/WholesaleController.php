<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\Wholesale\WholesaleCreateRequest;
use App\Api\Admin\Requests\Wholesale\WholesaleDestroyRequest;
use App\Api\Admin\Requests\Wholesale\WholesaleQueryRequest;
use App\Api\Admin\Requests\Wholesale\WholesaleUpdateRequest;
use App\Api\Admin\Responses\Wholesale\WholesaleDestroyResponse;
use App\Api\Admin\Responses\Wholesale\WholesaleQueryResponse;
use App\Api\Admin\Responses\Wholesale\WholesaleResponse;
use App\Entities\WholesaleEntity;
use App\Services\WholesaleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class WholesaleController extends BaseController
{
    #[OA\Post(path: '/wholesale/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: WholesaleQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: WholesaleQueryResponse::class))]
    public function query(WholesaleQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[WholesaleQueryRequest::getGoodsId])) {
                $condition[] = [WholesaleEntity::getGoodsId, '=', $requestData[WholesaleQueryRequest::getGoodsId]];
            }
            if (isset($requestData[WholesaleQueryRequest::getActId])) {
                $condition[] = [WholesaleEntity::getActId, '=', $requestData[WholesaleQueryRequest::getActId]];
            }
            
            $wholesaleService = new WholesaleService;
            $result = $wholesaleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new WholesaleResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new WholesaleQueryResponse($result);
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

    #[OA\Post(path: '/wholesale/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: WholesaleCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: WholesaleResponse::class))]
    public function store(WholesaleCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new WholesaleEntity($requestData);

            $wholesaleService = new WholesaleService;
            if ($wholesaleService->save($input->toEntity())) {
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

    #[OA\Get(path: '/wholesale/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: WholesaleResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $wholesaleService = new WholesaleService;
            $wholesale = $wholesaleService->getOneById($id);
            if (empty($wholesale)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new WholesaleResponse($wholesale);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/wholesale/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: WholesaleUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: WholesaleResponse::class))]
    public function update(WholesaleUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $wholesaleService = new WholesaleService;
            $wholesale = $wholesaleService->getOneById($id);
            if (empty($wholesale)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new WholesaleEntity($requestData);

            $wholesaleService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/wholesale/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: WholesaleDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: WholesaleDestroyResponse::class))]
    public function destroy(WholesaleDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $wholesaleService = new WholesaleService;
            if ($wholesaleService->removeByIds($requestData['ids'])) {
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
