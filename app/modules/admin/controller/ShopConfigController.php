<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopConfigEntity;
use app\bundles\shop\service\ShopConfigBundleService;
use app\modules\admin\request\shopConfig\ShopConfigCreateRequest;
use app\modules\admin\request\shopConfig\ShopConfigQueryRequest;
use app\modules\admin\request\shopConfig\ShopConfigUpdateRequest;
use app\modules\admin\response\shopConfig\ShopConfigQueryResponse;
use app\modules\admin\response\shopConfig\ShopConfigResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopConfigController extends BaseController
{
    #[OA\Post(path: '/shopConfig/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商店配置模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopConfigQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopConfigBundleService = new ShopConfigBundleService();
            $result = $shopConfigBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopConfigResponse();
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

    #[OA\Post(path: '/shopConfig/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商店配置模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopConfigCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopConfigEntity = new ShopConfigEntity();
            $shopConfigEntity->loadData($request);

            $shopConfigBundleService = new ShopConfigBundleService();
            $insertId = $shopConfigBundleService->save($shopConfigEntity->toArray());
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

    #[OA\Get(path: '/shopConfig/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商店配置模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopConfigResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopConfigBundleService = new ShopConfigBundleService();
            $shopConfig = $shopConfigBundleService->getOne($condition);

            if (empty($shopConfig)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopConfigResponse();
            $response->loadData($shopConfig);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopConfig/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商店配置模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopConfigUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopConfigUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopConfigBundleService = new ShopConfigBundleService();
            $shopConfig = $shopConfigBundleService->getById($request['id']);
            if (empty($shopConfig)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopConfigEntity = new ShopConfigEntity();
            $shopConfigEntity->loadData($request);

            $shopConfigBundleService->update($shopConfigEntity->toArray(), [
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

    #[OA\Delete(path: '/shopConfig/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商店配置模块'])]
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

            $shopConfigBundleService = new ShopConfigBundleService();
            if ($shopConfigBundleService->remove($condition)) {
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
