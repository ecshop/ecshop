<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\email\entity\EmailTemplateEntity;
use app\bundles\email\service\EmailTemplateBundleService;
use app\modules\admin\request\emailTemplate\EmailTemplateCreateRequest;
use app\modules\admin\request\emailTemplate\EmailTemplateQueryRequest;
use app\modules\admin\request\emailTemplate\EmailTemplateUpdateRequest;
use app\modules\admin\response\emailTemplate\EmailTemplateQueryResponse;
use app\modules\admin\response\emailTemplate\EmailTemplateResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class EmailTemplateController extends BaseController
{
    #[OA\Post(path: '/emailTemplate/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['邮件模板模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: EmailTemplateQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: EmailTemplateQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new EmailTemplateQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $emailTemplateBundleService = new EmailTemplateBundleService();
            $result = $emailTemplateBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new EmailTemplateResponse();
                $response->loadData($item);
                $result['data'][$key] = $response->toArray();
            }

            return $this->success($result);
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('查询列表错误');
        }
    }

    #[OA\Post(path: '/emailTemplate/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['邮件模板模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: EmailTemplateCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new EmailTemplateCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $emailTemplateEntity = new EmailTemplateEntity();
            $emailTemplateEntity->loadData($request);

            $emailTemplateBundleService = new EmailTemplateBundleService();
            $insertId = $emailTemplateBundleService->save($emailTemplateEntity->toArray());
            if ($insertId > 0) {
                DB::commit();

                return $this->success('新增数据成功');
            }

            throw new CustomException('新增数据失败');
        } catch (Throwable $e) {
            DB::rollback();

            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('新增数据错误');
        }
    }

    #[OA\Get(path: '/emailTemplate/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['邮件模板模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: EmailTemplateResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $emailTemplateBundleService = new EmailTemplateBundleService();
            $emailTemplate = $emailTemplateBundleService->getOne($condition);

            if (empty($emailTemplate)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new EmailTemplateResponse();
            $response->loadData($emailTemplate);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/emailTemplate/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['邮件模板模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: EmailTemplateUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new EmailTemplateUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $emailTemplateBundleService = new EmailTemplateBundleService();
            $emailTemplate = $emailTemplateBundleService->getById($request['id']);
            if (empty($emailTemplate)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $emailTemplateEntity = new EmailTemplateEntity();
            $emailTemplateEntity->loadData($request);

            $emailTemplateBundleService->update($emailTemplateEntity->toArray(), [
                ['id', '=', $request['id']],
            ]);

            DB::commit();

            return $this->success('更新数据成功');
        } catch (Throwable $e) {
            DB::rollback();

            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('更新数据错误');
        }
    }

    #[OA\Delete(path: '/emailTemplate/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['邮件模板模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK')]
    public function destroy(): Response
    {
        DB::startTrans();
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $emailTemplateBundleService = new EmailTemplateBundleService();
            if ($emailTemplateBundleService->remove($condition)) {
                DB::commit();

                return $this->success('删除数据成功');
            }

            throw new CustomException('删除数据失败');
        } catch (Throwable $e) {
            DB::rollback();

            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('删除数据错误');
        }
    }
}
