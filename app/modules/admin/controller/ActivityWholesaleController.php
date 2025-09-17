<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\activity\entity\ActivityWholesaleEntity;
use app\bundles\activity\service\ActivityWholesaleBundleService;
use app\modules\admin\request\activityWholesale\ActivityWholesaleCreateRequest;
use app\modules\admin\request\activityWholesale\ActivityWholesaleQueryRequest;
use app\modules\admin\request\activityWholesale\ActivityWholesaleUpdateRequest;
use app\modules\admin\response\activityWholesale\ActivityWholesaleQueryResponse;
use app\modules\admin\response\activityWholesale\ActivityWholesaleResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ActivityWholesaleController extends BaseController
{
    #[OA\Post(path: '/activityWholesale/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品批发活动模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityWholesaleQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityWholesaleQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ActivityWholesaleQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $activityWholesaleBundleService = new ActivityWholesaleBundleService();
            $result = $activityWholesaleBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ActivityWholesaleResponse();
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

    #[OA\Post(path: '/activityWholesale/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品批发活动模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityWholesaleCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityWholesaleCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityWholesaleEntity = new ActivityWholesaleEntity();
            $activityWholesaleEntity->loadData($request);

            $activityWholesaleBundleService = new ActivityWholesaleBundleService();
            $insertId = $activityWholesaleBundleService->save($activityWholesaleEntity->toArray());
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

    #[OA\Get(path: '/activityWholesale/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品批发活动模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityWholesaleResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $activityWholesaleBundleService = new ActivityWholesaleBundleService();
            $activityWholesale = $activityWholesaleBundleService->getOne($condition);

            if (empty($activityWholesale)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ActivityWholesaleResponse();
            $response->loadData($activityWholesale);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/activityWholesale/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品批发活动模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityWholesaleUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityWholesaleUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityWholesaleBundleService = new ActivityWholesaleBundleService();
            $activityWholesale = $activityWholesaleBundleService->getById($request['id']);
            if (empty($activityWholesale)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $activityWholesaleEntity = new ActivityWholesaleEntity();
            $activityWholesaleEntity->loadData($request);

            $activityWholesaleBundleService->update($activityWholesaleEntity->toArray(), [
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

    #[OA\Delete(path: '/activityWholesale/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品批发活动模块'])]
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

            $activityWholesaleBundleService = new ActivityWholesaleBundleService();
            if ($activityWholesaleBundleService->remove($condition)) {
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
