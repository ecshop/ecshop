<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\Adsense\AdsenseCreateRequest;
use App\Api\Admin\Requests\Adsense\AdsenseDestroyRequest;
use App\Api\Admin\Requests\Adsense\AdsenseQueryRequest;
use App\Api\Admin\Requests\Adsense\AdsenseUpdateRequest;
use App\Api\Admin\Responses\Adsense\AdsenseDestroyResponse;
use App\Api\Admin\Responses\Adsense\AdsenseQueryResponse;
use App\Api\Admin\Responses\Adsense\AdsenseResponse;
use App\Entities\AdsenseEntity;
use App\Services\AdsenseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class AdsenseController extends BaseController
{
    #[OA\Post(path: '/adsense/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdsenseQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdsenseQueryResponse::class))]
    public function query(AdsenseQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[AdsenseQueryRequest::getFromAd])) {
                $condition[] = [AdsenseEntity::getFromAd, '=', $requestData[AdsenseQueryRequest::getFromAd]];
            }
            if (isset($requestData[AdsenseQueryRequest::getId])) {
                $condition[] = [AdsenseEntity::getId, '=', $requestData[AdsenseQueryRequest::getId]];
            }
            
            $adsenseService = new AdsenseService;
            $result = $adsenseService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdsenseResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new AdsenseQueryResponse($result);
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

    #[OA\Post(path: '/adsense/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdsenseCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdsenseResponse::class))]
    public function store(AdsenseCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new AdsenseEntity($requestData);

            $adsenseService = new AdsenseService;
            if ($adsenseService->save($input->toEntity())) {
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

    #[OA\Get(path: '/adsense/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdsenseResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $adsenseService = new AdsenseService;
            $adsense = $adsenseService->getOneById($id);
            if (empty($adsense)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new AdsenseResponse($adsense);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/adsense/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdsenseUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdsenseResponse::class))]
    public function update(AdsenseUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $adsenseService = new AdsenseService;
            $adsense = $adsenseService->getOneById($id);
            if (empty($adsense)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new AdsenseEntity($requestData);

            $adsenseService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/adsense/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdsenseDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdsenseDestroyResponse::class))]
    public function destroy(AdsenseDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $adsenseService = new AdsenseService;
            if ($adsenseService->removeByIds($requestData['ids'])) {
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
