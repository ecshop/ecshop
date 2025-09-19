<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\activity\entity\ActivityAuctionEntity;
use app\bundles\activity\service\ActivityAuctionBundleService;
use app\modules\admin\request\activityAuction\ActivityAuctionCreateRequest;
use app\modules\admin\request\activityAuction\ActivityAuctionQueryRequest;
use app\modules\admin\request\activityAuction\ActivityAuctionUpdateRequest;
use app\modules\admin\response\activityAuction\ActivityAuctionQueryResponse;
use app\modules\admin\response\activityAuction\ActivityAuctionResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ActivityAuctionController extends BaseController
{
    #[OA\Post(path: '/activityAuction/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['拍卖出价日志模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityAuctionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityAuctionQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ActivityAuctionQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $activityAuctionBundleService = new ActivityAuctionBundleService;
            $result = $activityAuctionBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ActivityAuctionResponse;
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

    #[OA\Post(path: '/activityAuction/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['拍卖出价日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityAuctionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityAuctionCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityAuctionEntity = new ActivityAuctionEntity;
            $activityAuctionEntity->loadData($request);

            $activityAuctionBundleService = new ActivityAuctionBundleService;
            $insertId = $activityAuctionBundleService->save($activityAuctionEntity->toArray());
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

    #[OA\Get(path: '/activityAuction/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['拍卖出价日志模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityAuctionResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $activityAuctionBundleService = new ActivityAuctionBundleService;
            $activityAuction = $activityAuctionBundleService->getOne($condition);

            if (empty($activityAuction)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ActivityAuctionResponse;
            $response->loadData($activityAuction);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/activityAuction/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['拍卖出价日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityAuctionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityAuctionUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityAuctionBundleService = new ActivityAuctionBundleService;
            $activityAuction = $activityAuctionBundleService->getById($request['id']);
            if (empty($activityAuction)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $activityAuctionEntity = new ActivityAuctionEntity;
            $activityAuctionEntity->loadData($request);

            $activityAuctionBundleService->update($activityAuctionEntity->toArray(), [
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

    #[OA\Delete(path: '/activityAuction/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['拍卖出价日志模块'])]
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

            $activityAuctionBundleService = new ActivityAuctionBundleService;
            if ($activityAuctionBundleService->remove($condition)) {
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
