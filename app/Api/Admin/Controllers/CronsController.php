<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\Crons\CronsCreateRequest;
use App\Api\Admin\Requests\Crons\CronsDestroyRequest;
use App\Api\Admin\Requests\Crons\CronsQueryRequest;
use App\Api\Admin\Requests\Crons\CronsUpdateRequest;
use App\Api\Admin\Responses\Crons\CronsDestroyResponse;
use App\Api\Admin\Responses\Crons\CronsQueryResponse;
use App\Api\Admin\Responses\Crons\CronsResponse;
use App\Entities\CronsEntity;
use App\Services\CronsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class CronsController extends BaseController
{
    #[OA\Post(path: '/crons/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CronsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CronsQueryResponse::class))]
    public function query(CronsQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[CronsQueryRequest::getCronCode])) {
                $condition[] = [CronsEntity::getCronCode, '=', $requestData[CronsQueryRequest::getCronCode]];
            }
            if (isset($requestData[CronsQueryRequest::getEnable])) {
                $condition[] = [CronsEntity::getEnable, '=', $requestData[CronsQueryRequest::getEnable]];
            }
            if (isset($requestData[CronsQueryRequest::getNextime])) {
                $condition[] = [CronsEntity::getNextime, '=', $requestData[CronsQueryRequest::getNextime]];
            }
            if (isset($requestData[CronsQueryRequest::getCronId])) {
                $condition[] = [CronsEntity::getCronId, '=', $requestData[CronsQueryRequest::getCronId]];
            }
            
            $cronsService = new CronsService;
            $result = $cronsService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new CronsResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new CronsQueryResponse($result);
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

    #[OA\Post(path: '/crons/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CronsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CronsResponse::class))]
    public function store(CronsCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new CronsEntity($requestData);

            $cronsService = new CronsService;
            if ($cronsService->save($input->toEntity())) {
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

    #[OA\Get(path: '/crons/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CronsResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $cronsService = new CronsService;
            $crons = $cronsService->getOneById($id);
            if (empty($crons)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new CronsResponse($crons);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/crons/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CronsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CronsResponse::class))]
    public function update(CronsUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $cronsService = new CronsService;
            $crons = $cronsService->getOneById($id);
            if (empty($crons)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new CronsEntity($requestData);

            $cronsService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/crons/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CronsDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CronsDestroyResponse::class))]
    public function destroy(CronsDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $cronsService = new CronsService;
            if ($cronsService->removeByIds($requestData['ids'])) {
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
