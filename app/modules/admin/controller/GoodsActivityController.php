<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsActivityEntity;
use app\bundles\goods\service\GoodsActivityBundleService;
use app\modules\admin\request\goodsActivity\GoodsActivityCreateRequest;
use app\modules\admin\request\goodsActivity\GoodsActivityQueryRequest;
use app\modules\admin\request\goodsActivity\GoodsActivityUpdateRequest;
use app\modules\admin\response\goodsActivity\GoodsActivityQueryResponse;
use app\modules\admin\response\goodsActivity\GoodsActivityResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsActivityController extends BaseController
{
    #[OA\Post(path: '/goodsActivity/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品活动模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsActivityQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsActivityQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsActivityQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsActivityBundleService = new GoodsActivityBundleService();
            $result = $goodsActivityBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsActivityResponse();
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

    #[OA\Post(path: '/goodsActivity/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品活动模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsActivityCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsActivityCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsActivityEntity = new GoodsActivityEntity();
            $goodsActivityEntity->loadData($request);

            $goodsActivityBundleService = new GoodsActivityBundleService();
            $insertId = $goodsActivityBundleService->save($goodsActivityEntity->toArray());
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

    #[OA\Get(path: '/goodsActivity/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品活动模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsActivityResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsActivityBundleService = new GoodsActivityBundleService();
            $goodsActivity = $goodsActivityBundleService->getOne($condition);

            if (empty($goodsActivity)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsActivityResponse();
            $response->loadData($goodsActivity);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsActivity/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品活动模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsActivityUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsActivityUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsActivityBundleService = new GoodsActivityBundleService();
            $goodsActivity = $goodsActivityBundleService->getById($request['id']);
            if (empty($goodsActivity)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsActivityEntity = new GoodsActivityEntity();
            $goodsActivityEntity->loadData($request);

            $goodsActivityBundleService->update($goodsActivityEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsActivity/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品活动模块'])]
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

            $goodsActivityBundleService = new GoodsActivityBundleService();
            if ($goodsActivityBundleService->remove($condition)) {
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
