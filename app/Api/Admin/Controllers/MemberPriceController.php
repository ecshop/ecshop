<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\MemberPrice\MemberPriceCreateRequest;
use App\Api\Admin\Requests\MemberPrice\MemberPriceDestroyRequest;
use App\Api\Admin\Requests\MemberPrice\MemberPriceQueryRequest;
use App\Api\Admin\Requests\MemberPrice\MemberPriceUpdateRequest;
use App\Api\Admin\Responses\MemberPrice\MemberPriceDestroyResponse;
use App\Api\Admin\Responses\MemberPrice\MemberPriceQueryResponse;
use App\Api\Admin\Responses\MemberPrice\MemberPriceResponse;
use App\Entities\MemberPriceEntity;
use App\Services\MemberPriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class MemberPriceController extends BaseController
{
    #[OA\Post(path: '/memberPrice/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MemberPriceQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MemberPriceQueryResponse::class))]
    public function query(MemberPriceQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[MemberPriceQueryRequest::getUserRank])) {
                $condition[] = [MemberPriceEntity::getUserRank, '=', $requestData[MemberPriceQueryRequest::getUserRank]];
            }
            if (isset($requestData[MemberPriceQueryRequest::getPriceId])) {
                $condition[] = [MemberPriceEntity::getPriceId, '=', $requestData[MemberPriceQueryRequest::getPriceId]];
            }
            
            $memberPriceService = new MemberPriceService;
            $result = $memberPriceService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new MemberPriceResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new MemberPriceQueryResponse($result);
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

    #[OA\Post(path: '/memberPrice/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MemberPriceCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MemberPriceResponse::class))]
    public function store(MemberPriceCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new MemberPriceEntity($requestData);

            $memberPriceService = new MemberPriceService;
            if ($memberPriceService->save($input->toEntity())) {
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

    #[OA\Get(path: '/memberPrice/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MemberPriceResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $memberPriceService = new MemberPriceService;
            $memberPrice = $memberPriceService->getOneById($id);
            if (empty($memberPrice)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new MemberPriceResponse($memberPrice);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/memberPrice/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MemberPriceUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MemberPriceResponse::class))]
    public function update(MemberPriceUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $memberPriceService = new MemberPriceService;
            $memberPrice = $memberPriceService->getOneById($id);
            if (empty($memberPrice)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new MemberPriceEntity($requestData);

            $memberPriceService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/memberPrice/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MemberPriceDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MemberPriceDestroyResponse::class))]
    public function destroy(MemberPriceDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $memberPriceService = new MemberPriceService;
            if ($memberPriceService->removeByIds($requestData['ids'])) {
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
