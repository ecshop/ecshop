<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\admin\entity\AdminMessageEntity;
use app\bundles\admin\service\AdminMessageBundleService;
use app\modules\admin\request\adminMessage\AdminMessageCreateRequest;
use app\modules\admin\request\adminMessage\AdminMessageQueryRequest;
use app\modules\admin\request\adminMessage\AdminMessageUpdateRequest;
use app\modules\admin\response\adminMessage\AdminMessageQueryResponse;
use app\modules\admin\response\adminMessage\AdminMessageResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdminMessageController extends BaseController
{
    #[OA\Post(path: '/adminMessage/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['管理员消息模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdminMessageQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adminMessageBundleService = new AdminMessageBundleService;
            $result = $adminMessageBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdminMessageResponse;
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

    #[OA\Post(path: '/adminMessage/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['管理员消息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminMessageCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminMessageEntity = new AdminMessageEntity;
            $adminMessageEntity->loadData($request);

            $adminMessageBundleService = new AdminMessageBundleService;
            $insertId = $adminMessageBundleService->save($adminMessageEntity->toArray());
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

    #[OA\Get(path: '/adminMessage/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['管理员消息模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdminMessageResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adminMessageBundleService = new AdminMessageBundleService;
            $adminMessage = $adminMessageBundleService->getOne($condition);

            if (empty($adminMessage)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdminMessageResponse;
            $response->loadData($adminMessage);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adminMessage/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['管理员消息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdminMessageUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdminMessageUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adminMessageBundleService = new AdminMessageBundleService;
            $adminMessage = $adminMessageBundleService->getById($request['id']);
            if (empty($adminMessage)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adminMessageEntity = new AdminMessageEntity;
            $adminMessageEntity->loadData($request);

            $adminMessageBundleService->update($adminMessageEntity->toArray(), [
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

    #[OA\Delete(path: '/adminMessage/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['管理员消息模块'])]
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

            $adminMessageBundleService = new AdminMessageBundleService;
            if ($adminMessageBundleService->remove($condition)) {
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
