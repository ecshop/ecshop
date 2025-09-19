<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopPluginsEntity;
use app\bundles\shop\service\ShopPluginsBundleService;
use app\modules\admin\request\shopPlugins\ShopPluginsCreateRequest;
use app\modules\admin\request\shopPlugins\ShopPluginsQueryRequest;
use app\modules\admin\request\shopPlugins\ShopPluginsUpdateRequest;
use app\modules\admin\response\shopPlugins\ShopPluginsQueryResponse;
use app\modules\admin\response\shopPlugins\ShopPluginsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopPluginsController extends BaseController
{
    #[OA\Post(path: '/shopPlugins/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['插件管理模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopPluginsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopPluginsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopPluginsQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopPluginsBundleService = new ShopPluginsBundleService;
            $result = $shopPluginsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopPluginsResponse;
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

    #[OA\Post(path: '/shopPlugins/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['插件管理模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopPluginsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopPluginsCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopPluginsEntity = new ShopPluginsEntity;
            $shopPluginsEntity->loadData($request);

            $shopPluginsBundleService = new ShopPluginsBundleService;
            $insertId = $shopPluginsBundleService->save($shopPluginsEntity->toArray());
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

    #[OA\Get(path: '/shopPlugins/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['插件管理模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopPluginsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopPluginsBundleService = new ShopPluginsBundleService;
            $shopPlugins = $shopPluginsBundleService->getOne($condition);

            if (empty($shopPlugins)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopPluginsResponse;
            $response->loadData($shopPlugins);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopPlugins/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['插件管理模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopPluginsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopPluginsUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopPluginsBundleService = new ShopPluginsBundleService;
            $shopPlugins = $shopPluginsBundleService->getById($request['id']);
            if (empty($shopPlugins)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopPluginsEntity = new ShopPluginsEntity;
            $shopPluginsEntity->loadData($request);

            $shopPluginsBundleService->update($shopPluginsEntity->toArray(), [
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

    #[OA\Delete(path: '/shopPlugins/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['插件管理模块'])]
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

            $shopPluginsBundleService = new ShopPluginsBundleService;
            if ($shopPluginsBundleService->remove($condition)) {
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
