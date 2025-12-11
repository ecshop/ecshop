<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\AutoManage\AutoManageCreateRequest;
use App\Api\Admin\Requests\AutoManage\AutoManageDestroyRequest;
use App\Api\Admin\Requests\AutoManage\AutoManageQueryRequest;
use App\Api\Admin\Requests\AutoManage\AutoManageUpdateRequest;
use App\Api\Admin\Responses\AutoManage\AutoManageDestroyResponse;
use App\Api\Admin\Responses\AutoManage\AutoManageQueryResponse;
use App\Api\Admin\Responses\AutoManage\AutoManageResponse;
use App\Entities\AutoManageEntity;
use App\Services\AutoManageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class AutoManageController extends BaseController
{
    #[OA\Post(path: '/autoManage/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AutoManageQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AutoManageQueryResponse::class))]
    public function query(AutoManageQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[AutoManageQueryRequest::getType])) {
                $condition[] = [AutoManageEntity::getType, '=', $requestData[AutoManageQueryRequest::getType]];
            }
            if (isset($requestData[AutoManageQueryRequest::getId])) {
                $condition[] = [AutoManageEntity::getId, '=', $requestData[AutoManageQueryRequest::getId]];
            }
            
            $autoManageService = new AutoManageService;
            $result = $autoManageService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AutoManageResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new AutoManageQueryResponse($result);
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

    #[OA\Post(path: '/autoManage/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AutoManageCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AutoManageResponse::class))]
    public function store(AutoManageCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new AutoManageEntity($requestData);

            $autoManageService = new AutoManageService;
            if ($autoManageService->save($input->toEntity())) {
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

    #[OA\Get(path: '/autoManage/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AutoManageResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $autoManageService = new AutoManageService;
            $autoManage = $autoManageService->getOneById($id);
            if (empty($autoManage)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new AutoManageResponse($autoManage);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/autoManage/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AutoManageUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AutoManageResponse::class))]
    public function update(AutoManageUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $autoManageService = new AutoManageService;
            $autoManage = $autoManageService->getOneById($id);
            if (empty($autoManage)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new AutoManageEntity($requestData);

            $autoManageService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/autoManage/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AutoManageDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AutoManageDestroyResponse::class))]
    public function destroy(AutoManageDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $autoManageService = new AutoManageService;
            if ($autoManageService->removeByIds($requestData['ids'])) {
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
