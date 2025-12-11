<?php

declare(strict_types=1);

namespace App\Api\Admin\Controllers;

use App\Api\Admin\Controllers\BaseController;
use App\Api\Admin\Requests\MailTemplates\MailTemplatesCreateRequest;
use App\Api\Admin\Requests\MailTemplates\MailTemplatesDestroyRequest;
use App\Api\Admin\Requests\MailTemplates\MailTemplatesQueryRequest;
use App\Api\Admin\Requests\MailTemplates\MailTemplatesUpdateRequest;
use App\Api\Admin\Responses\MailTemplates\MailTemplatesDestroyResponse;
use App\Api\Admin\Responses\MailTemplates\MailTemplatesQueryResponse;
use App\Api\Admin\Responses\MailTemplates\MailTemplatesResponse;
use App\Entities\MailTemplatesEntity;
use App\Services\MailTemplatesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Juling\Foundation\Enums\BusinessEnum;
use Juling\Foundation\Exceptions\BusinessException;
use OpenApi\Attributes as OA;
use Throwable;

class MailTemplatesController extends BaseController
{
    #[OA\Post(path: '/mailTemplates/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MailTemplatesQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MailTemplatesQueryResponse::class))]
    public function query(MailTemplatesQueryRequest $queryRequest): JsonResponse
    {
        $page = intval($queryRequest->query('page', 1));
        $pageSize = intval($queryRequest->query('pageSize', 10));
        $requestData = $queryRequest->post();

        try {
            $condition = [];
            if (isset($requestData[MailTemplatesQueryRequest::getTemplateId])) {
                $condition[] = [MailTemplatesEntity::getTemplateId, '=', $requestData[MailTemplatesQueryRequest::getTemplateId]];
            }
            if (isset($requestData[MailTemplatesQueryRequest::getTemplateCode])) {
                $condition[] = [MailTemplatesEntity::getTemplateCode, '=', $requestData[MailTemplatesQueryRequest::getTemplateCode]];
            }
            if (isset($requestData[MailTemplatesQueryRequest::getType])) {
                $condition[] = [MailTemplatesEntity::getType, '=', $requestData[MailTemplatesQueryRequest::getType]];
            }
            
            $mailTemplatesService = new MailTemplatesService;
            $result = $mailTemplatesService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new MailTemplatesResponse($item);
                $result['data'][$key] = $response->toArray();
            }

            $response = new MailTemplatesQueryResponse($result);
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

    #[OA\Post(path: '/mailTemplates/store', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MailTemplatesCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MailTemplatesResponse::class))]
    public function store(MailTemplatesCreateRequest $createRequest): JsonResponse
    {
        $requestData = $createRequest->post();

        DB::beginTransaction();
        try {
            $input = new MailTemplatesEntity($requestData);

            $mailTemplatesService = new MailTemplatesService;
            if ($mailTemplatesService->save($input->toEntity())) {
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

    #[OA\Get(path: '/mailTemplates/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MailTemplatesResponse::class))]
    public function show(Request $request): JsonResponse
    {
        $id = intval($request->query('id', 0));

        try {
            $mailTemplatesService = new MailTemplatesService;
            $mailTemplates = $mailTemplatesService->getOneById($id);
            if (empty($mailTemplates)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $response = new MailTemplatesResponse($mailTemplates);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof BusinessException) {
                return $this->error($e);
            }

            Log::error($e);

            return $this->error(BusinessEnum::SHOW_ERROR);
        }
    }

    #[OA\Put(path: '/mailTemplates/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MailTemplatesUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MailTemplatesResponse::class))]
    public function update(MailTemplatesUpdateRequest $updateRequest): JsonResponse
    {
        $id = intval($updateRequest->query('id', 0));
        $requestData = $updateRequest->post();

        DB::beginTransaction();
        try {
            $mailTemplatesService = new MailTemplatesService;
            $mailTemplates = $mailTemplatesService->getOneById($id);
            if (empty($mailTemplates)) {
                throw new BusinessException(BusinessEnum::NOT_FOUND);
            }

            $input = new MailTemplatesEntity($requestData);

            $mailTemplatesService->updateById($input->toEntity(), $id);

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

    #[OA\Delete(path: '/mailTemplates/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: MailTemplatesDestroyRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: MailTemplatesDestroyResponse::class))]
    public function destroy(MailTemplatesDestroyRequest $destroyRequest): JsonResponse
    {
        $requestData = $destroyRequest->post();

        DB::beginTransaction();
        try {
            $mailTemplatesService = new MailTemplatesService;
            if ($mailTemplatesService->removeByIds($requestData['ids'])) {
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
