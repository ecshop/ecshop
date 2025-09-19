<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\admin\entity\AdminLogEntity;
use app\bundles\admin\service\AdminLogBundleService;
use app\modules\admin\request\adminLog\AdminLogCreateRequest;
use app\modules\admin\request\adminLog\AdminLogQueryRequest;
use app\modules\admin\request\adminLog\AdminLogUpdateRequest;
use app\modules\admin\response\adminLog\AdminLogQueryResponse;
use app\modules\admin\response\adminLog\AdminLogResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdminLogController extends BaseController
{
    #[OA\Post(path: '/adminLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['管理员操作日志模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminLogQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdminLogQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adminLogBundleService = new AdminLogBundleService;
            $result = $adminLogBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdminLogResponse;
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

    #[OA\Post(path: '/adminLog/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['管理员操作日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminLogCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminLogEntity = new AdminLogEntity;
            $adminLogEntity->loadData($request);

            $adminLogBundleService = new AdminLogBundleService;
            $insertId = $adminLogBundleService->save($adminLogEntity->toArray());
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

    #[OA\Get(path: '/adminLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['管理员操作日志模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminLogResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adminLogBundleService = new AdminLogBundleService;
            $adminLog = $adminLogBundleService->getOne($condition);

            if (empty($adminLog)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdminLogResponse;
            $response->loadData($adminLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adminLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['管理员操作日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminLogUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminLogBundleService = new AdminLogBundleService;
            $adminLog = $adminLogBundleService->getById($request['id']);
            if (empty($adminLog)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adminLogEntity = new AdminLogEntity;
            $adminLogEntity->loadData($request);

            $adminLogBundleService->update($adminLogEntity->toArray(), [
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

    #[OA\Delete(path: '/adminLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['管理员操作日志模块'])]
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

            $adminLogBundleService = new AdminLogBundleService;
            if ($adminLogBundleService->remove($condition)) {
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
