<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\CatRecommend\CatRecommendCreateRequest;
use App\Api\Admin\Requests\CatRecommend\CatRecommendDestroyRequest;
use App\Api\Admin\Requests\CatRecommend\CatRecommendQueryRequest;
use App\Api\Admin\Requests\CatRecommend\CatRecommendUpdateRequest;
use App\Api\Admin\Responses\CatRecommend\CatRecommendDestroyResponse;
use App\Api\Admin\Responses\CatRecommend\CatRecommendQueryResponse;
use App\Api\Admin\Responses\CatRecommend\CatRecommendResponse;
use App\Entities\CatRecommendEntity;
use App\Services\CatRecommendService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class CatRecommendController extends BaseController
{
    #[OA\Post(path: '/catRecommend/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CatRecommendQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CatRecommendQueryResponse::class))]
    public function query(CatRecommendQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[CatRecommendQueryRequest::getRecommendType])) {
                $condition[] = [CatRecommendEntity::getRecommendType, '=', $requestData[CatRecommendQueryRequest::getRecommendType]];
            }
            if (isset($requestData[CatRecommendQueryRequest::getId])) {
                $condition[] = [CatRecommendEntity::getId, '=', $requestData[CatRecommendQueryRequest::getId]];
            }
            
            $catRecommendService = new CatRecommendService;
            $result = $catRecommendService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new CatRecommendResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new CatRecommendQueryResponse($result);
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

    #[OA\Post(path: '/catRecommend/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CatRecommendCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CatRecommendResponse::class))]
    public function store(CatRecommendCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new CatRecommendEntity($requestData);

            $catRecommendService = new CatRecommendService;
            if ($catRecommendService->save($input->toEntity())) {
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

    #[OA\Get(path: '/catRecommend/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CatRecommendResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $catRecommendService = new CatRecommendService;
            $catRecommend = $catRecommendService->getOneById($id);
            if (empty($catRecommend)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new CatRecommendResponse($catRecommend);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/catRecommend/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CatRecommendUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CatRecommendResponse::class))]
    public function update(CatRecommendUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $catRecommendService = new CatRecommendService;
            $catRecommend = $catRecommendService->getOneById($id);
            if (empty($catRecommend)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new CatRecommendEntity($requestData);

            $catRecommendService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/catRecommend/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CatRecommendDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CatRecommendDestroyResponse::class))]
    public function destroy(CatRecommendDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $catRecommendService = new CatRecommendService;
            if ($catRecommendService->removeByIds($requestData['ids'])) {
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
