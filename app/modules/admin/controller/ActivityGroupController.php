<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\activity\entity\ActivityGroupEntity;
use app\bundles\activity\service\ActivityGroupBundleService;
use app\modules\admin\request\activityGroup\ActivityGroupCreateRequest;
use app\modules\admin\request\activityGroup\ActivityGroupQueryRequest;
use app\modules\admin\request\activityGroup\ActivityGroupUpdateRequest;
use app\modules\admin\response\activityGroup\ActivityGroupQueryResponse;
use app\modules\admin\response\activityGroup\ActivityGroupResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ActivityGroupController extends BaseController
{
    #[OA\Post(path: '/activityGroup/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品组合关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityGroupQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityGroupQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ActivityGroupQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $activityGroupBundleService = new ActivityGroupBundleService();
            $result = $activityGroupBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ActivityGroupResponse();
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

    #[OA\Post(path: '/activityGroup/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品组合关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityGroupCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityGroupCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityGroupEntity = new ActivityGroupEntity();
            $activityGroupEntity->loadData($request);

            $activityGroupBundleService = new ActivityGroupBundleService();
            $insertId = $activityGroupBundleService->save($activityGroupEntity->toArray());
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

    #[OA\Get(path: '/activityGroup/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品组合关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityGroupResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $activityGroupBundleService = new ActivityGroupBundleService();
            $activityGroup = $activityGroupBundleService->getOne($condition);

            if (empty($activityGroup)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ActivityGroupResponse();
            $response->loadData($activityGroup);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/activityGroup/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品组合关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityGroupUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityGroupUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityGroupBundleService = new ActivityGroupBundleService();
            $activityGroup = $activityGroupBundleService->getById($request['id']);
            if (empty($activityGroup)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $activityGroupEntity = new ActivityGroupEntity();
            $activityGroupEntity->loadData($request);

            $activityGroupBundleService->update($activityGroupEntity->toArray(), [
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

    #[OA\Delete(path: '/activityGroup/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品组合关联模块'])]
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

            $activityGroupBundleService = new ActivityGroupBundleService();
            if ($activityGroupBundleService->remove($condition)) {
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
