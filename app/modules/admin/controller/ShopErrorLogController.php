<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopErrorLogEntity;
use app\bundles\shop\service\ShopErrorLogBundleService;
use app\modules\admin\request\shopErrorLog\ShopErrorLogCreateRequest;
use app\modules\admin\request\shopErrorLog\ShopErrorLogQueryRequest;
use app\modules\admin\request\shopErrorLog\ShopErrorLogUpdateRequest;
use app\modules\admin\response\shopErrorLog\ShopErrorLogQueryResponse;
use app\modules\admin\response\shopErrorLog\ShopErrorLogResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopErrorLogController extends BaseController
{
    #[OA\Post(path: '/shopErrorLog/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['系统错误日志模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopErrorLogQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopErrorLogQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopErrorLogQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopErrorLogBundleService = new ShopErrorLogBundleService();
            $result = $shopErrorLogBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopErrorLogResponse();
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

    #[OA\Post(path: '/shopErrorLog/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['系统错误日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopErrorLogCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopErrorLogCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopErrorLogEntity = new ShopErrorLogEntity();
            $shopErrorLogEntity->loadData($request);

            $shopErrorLogBundleService = new ShopErrorLogBundleService();
            $insertId = $shopErrorLogBundleService->save($shopErrorLogEntity->toArray());
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

    #[OA\Get(path: '/shopErrorLog/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['系统错误日志模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopErrorLogResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopErrorLogBundleService = new ShopErrorLogBundleService();
            $shopErrorLog = $shopErrorLogBundleService->getOne($condition);

            if (empty($shopErrorLog)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopErrorLogResponse();
            $response->loadData($shopErrorLog);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopErrorLog/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['系统错误日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopErrorLogUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopErrorLogUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopErrorLogBundleService = new ShopErrorLogBundleService();
            $shopErrorLog = $shopErrorLogBundleService->getById($request['id']);
            if (empty($shopErrorLog)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopErrorLogEntity = new ShopErrorLogEntity();
            $shopErrorLogEntity->loadData($request);

            $shopErrorLogBundleService->update($shopErrorLogEntity->toArray(), [
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

    #[OA\Delete(path: '/shopErrorLog/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['系统错误日志模块'])]
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

            $shopErrorLogBundleService = new ShopErrorLogBundleService();
            if ($shopErrorLogBundleService->remove($condition)) {
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
