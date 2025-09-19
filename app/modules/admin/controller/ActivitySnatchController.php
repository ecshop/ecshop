<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\activity\entity\ActivitySnatchEntity;
use app\bundles\activity\service\ActivitySnatchBundleService;
use app\modules\admin\request\activitySnatch\ActivitySnatchCreateRequest;
use app\modules\admin\request\activitySnatch\ActivitySnatchQueryRequest;
use app\modules\admin\request\activitySnatch\ActivitySnatchUpdateRequest;
use app\modules\admin\response\activitySnatch\ActivitySnatchQueryResponse;
use app\modules\admin\response\activitySnatch\ActivitySnatchResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ActivitySnatchController extends BaseController
{
    #[OA\Post(path: '/activitySnatch/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['抢购活动出价日志模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivitySnatchQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivitySnatchQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ActivitySnatchQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $activitySnatchBundleService = new ActivitySnatchBundleService;
            $result = $activitySnatchBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ActivitySnatchResponse;
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

    #[OA\Post(path: '/activitySnatch/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['抢购活动出价日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivitySnatchCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivitySnatchCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activitySnatchEntity = new ActivitySnatchEntity;
            $activitySnatchEntity->loadData($request);

            $activitySnatchBundleService = new ActivitySnatchBundleService;
            $insertId = $activitySnatchBundleService->save($activitySnatchEntity->toArray());
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

    #[OA\Get(path: '/activitySnatch/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['抢购活动出价日志模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivitySnatchResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $activitySnatchBundleService = new ActivitySnatchBundleService;
            $activitySnatch = $activitySnatchBundleService->getOne($condition);

            if (empty($activitySnatch)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ActivitySnatchResponse;
            $response->loadData($activitySnatch);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/activitySnatch/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['抢购活动出价日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivitySnatchUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivitySnatchUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activitySnatchBundleService = new ActivitySnatchBundleService;
            $activitySnatch = $activitySnatchBundleService->getById($request['id']);
            if (empty($activitySnatch)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $activitySnatchEntity = new ActivitySnatchEntity;
            $activitySnatchEntity->loadData($request);

            $activitySnatchBundleService->update($activitySnatchEntity->toArray(), [
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

    #[OA\Delete(path: '/activitySnatch/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['抢购活动出价日志模块'])]
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

            $activitySnatchBundleService = new ActivitySnatchBundleService;
            if ($activitySnatchBundleService->remove($condition)) {
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
