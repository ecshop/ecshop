<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopPackEntity;
use app\bundles\shop\service\ShopPackBundleService;
use app\modules\admin\request\shopPack\ShopPackCreateRequest;
use app\modules\admin\request\shopPack\ShopPackQueryRequest;
use app\modules\admin\request\shopPack\ShopPackUpdateRequest;
use app\modules\admin\response\shopPack\ShopPackQueryResponse;
use app\modules\admin\response\shopPack\ShopPackResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopPackController extends BaseController
{
    #[OA\Post(path: '/shopPack/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品礼包模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopPackQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopPackQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopPackQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopPackBundleService = new ShopPackBundleService;
            $result = $shopPackBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopPackResponse;
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

    #[OA\Post(path: '/shopPack/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品礼包模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopPackCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopPackCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopPackEntity = new ShopPackEntity;
            $shopPackEntity->loadData($request);

            $shopPackBundleService = new ShopPackBundleService;
            $insertId = $shopPackBundleService->save($shopPackEntity->toArray());
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

    #[OA\Get(path: '/shopPack/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品礼包模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopPackResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopPackBundleService = new ShopPackBundleService;
            $shopPack = $shopPackBundleService->getOne($condition);

            if (empty($shopPack)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopPackResponse;
            $response->loadData($shopPack);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopPack/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品礼包模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopPackUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopPackUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopPackBundleService = new ShopPackBundleService;
            $shopPack = $shopPackBundleService->getById($request['id']);
            if (empty($shopPack)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopPackEntity = new ShopPackEntity;
            $shopPackEntity->loadData($request);

            $shopPackBundleService->update($shopPackEntity->toArray(), [
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

    #[OA\Delete(path: '/shopPack/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品礼包模块'])]
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

            $shopPackBundleService = new ShopPackBundleService;
            if ($shopPackBundleService->remove($condition)) {
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
