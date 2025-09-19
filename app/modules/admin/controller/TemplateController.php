<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\template\entity\TemplateEntity;
use app\bundles\template\service\TemplateBundleService;
use app\modules\admin\request\template\TemplateCreateRequest;
use app\modules\admin\request\template\TemplateQueryRequest;
use app\modules\admin\request\template\TemplateUpdateRequest;
use app\modules\admin\response\template\TemplateQueryResponse;
use app\modules\admin\response\template\TemplateResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class TemplateController extends BaseController
{
    #[OA\Post(path: '/template/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['模板配置模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: TemplateQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: TemplateQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new TemplateQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $templateBundleService = new TemplateBundleService;
            $result = $templateBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new TemplateResponse;
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

    #[OA\Post(path: '/template/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['模板配置模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: TemplateCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new TemplateCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $templateEntity = new TemplateEntity;
            $templateEntity->loadData($request);

            $templateBundleService = new TemplateBundleService;
            $insertId = $templateBundleService->save($templateEntity->toArray());
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

    #[OA\Get(path: '/template/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['模板配置模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: TemplateResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $templateBundleService = new TemplateBundleService;
            $template = $templateBundleService->getOne($condition);

            if (empty($template)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new TemplateResponse;
            $response->loadData($template);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/template/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['模板配置模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: TemplateUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new TemplateUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $templateBundleService = new TemplateBundleService;
            $template = $templateBundleService->getById($request['id']);
            if (empty($template)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $templateEntity = new TemplateEntity;
            $templateEntity->loadData($request);

            $templateBundleService->update($templateEntity->toArray(), [
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

    #[OA\Delete(path: '/template/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['模板配置模块'])]
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

            $templateBundleService = new TemplateBundleService;
            if ($templateBundleService->remove($condition)) {
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
