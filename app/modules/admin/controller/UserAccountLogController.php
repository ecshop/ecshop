<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserAccountLogEntity;
use app\bundles\user\service\UserAccountLogBundleService;
use app\modules\admin\request\userAccountLog\UserAccountLogCreateRequest;
use app\modules\admin\request\userAccountLog\UserAccountLogQueryRequest;
use app\modules\admin\request\userAccountLog\UserAccountLogUpdateRequest;
use app\modules\admin\response\userAccountLog\UserAccountLogQueryResponse;
use app\modules\admin\response\userAccountLog\UserAccountLogResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserAccountLogController extends BaseController
{
    #[OA\Post(path: '/userAccountLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户资金账户日志模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAccountLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAccountLogQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserAccountLogQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userAccountLogBundleService = new UserAccountLogBundleService();
            $result = $userAccountLogBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserAccountLogResponse();
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

    #[OA\Post(path: '/userAccountLog/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户资金账户日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAccountLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAccountLogCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAccountLogEntity = new UserAccountLogEntity();
            $userAccountLogEntity->loadData($request);

            $userAccountLogBundleService = new UserAccountLogBundleService();
            $insertId = $userAccountLogBundleService->save($userAccountLogEntity->toArray());
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

    #[OA\Get(path: '/userAccountLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户资金账户日志模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAccountLogResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userAccountLogBundleService = new UserAccountLogBundleService();
            $userAccountLog = $userAccountLogBundleService->getOne($condition);

            if (empty($userAccountLog)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserAccountLogResponse();
            $response->loadData($userAccountLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userAccountLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户资金账户日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAccountLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAccountLogUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAccountLogBundleService = new UserAccountLogBundleService();
            $userAccountLog = $userAccountLogBundleService->getById($request['id']);
            if (empty($userAccountLog)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userAccountLogEntity = new UserAccountLogEntity();
            $userAccountLogEntity->loadData($request);

            $userAccountLogBundleService->update($userAccountLogEntity->toArray(), [
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

    #[OA\Delete(path: '/userAccountLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户资金账户日志模块'])]
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

            $userAccountLogBundleService = new UserAccountLogBundleService();
            if ($userAccountLogBundleService->remove($condition)) {
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
