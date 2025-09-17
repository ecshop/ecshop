<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\activity\entity\ActivityTopicEntity;
use app\bundles\activity\service\ActivityTopicBundleService;
use app\modules\admin\request\activityTopic\ActivityTopicCreateRequest;
use app\modules\admin\request\activityTopic\ActivityTopicQueryRequest;
use app\modules\admin\request\activityTopic\ActivityTopicUpdateRequest;
use app\modules\admin\response\activityTopic\ActivityTopicQueryResponse;
use app\modules\admin\response\activityTopic\ActivityTopicResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ActivityTopicController extends BaseController
{
    #[OA\Post(path: '/activityTopic/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['专题活动模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityTopicQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityTopicQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ActivityTopicQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $activityTopicBundleService = new ActivityTopicBundleService();
            $result = $activityTopicBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ActivityTopicResponse();
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

    #[OA\Post(path: '/activityTopic/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['专题活动模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityTopicCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityTopicCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityTopicEntity = new ActivityTopicEntity();
            $activityTopicEntity->loadData($request);

            $activityTopicBundleService = new ActivityTopicBundleService();
            $insertId = $activityTopicBundleService->save($activityTopicEntity->toArray());
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

    #[OA\Get(path: '/activityTopic/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['专题活动模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityTopicResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $activityTopicBundleService = new ActivityTopicBundleService();
            $activityTopic = $activityTopicBundleService->getOne($condition);

            if (empty($activityTopic)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ActivityTopicResponse();
            $response->loadData($activityTopic);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/activityTopic/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['专题活动模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityTopicUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityTopicUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityTopicBundleService = new ActivityTopicBundleService();
            $activityTopic = $activityTopicBundleService->getById($request['id']);
            if (empty($activityTopic)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $activityTopicEntity = new ActivityTopicEntity();
            $activityTopicEntity->loadData($request);

            $activityTopicBundleService->update($activityTopicEntity->toArray(), [
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

    #[OA\Delete(path: '/activityTopic/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['专题活动模块'])]
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

            $activityTopicBundleService = new ActivityTopicBundleService();
            if ($activityTopicBundleService->remove($condition)) {
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
