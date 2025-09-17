<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsTypeEntity;
use app\bundles\goods\service\GoodsTypeBundleService;
use app\modules\admin\request\goodsType\GoodsTypeCreateRequest;
use app\modules\admin\request\goodsType\GoodsTypeQueryRequest;
use app\modules\admin\request\goodsType\GoodsTypeUpdateRequest;
use app\modules\admin\response\goodsType\GoodsTypeQueryResponse;
use app\modules\admin\response\goodsType\GoodsTypeResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsTypeController extends BaseController
{
    #[OA\Post(path: '/goodsType/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品类型模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsTypeQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsTypeQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsTypeQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsTypeBundleService = new GoodsTypeBundleService();
            $result = $goodsTypeBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsTypeResponse();
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

    #[OA\Post(path: '/goodsType/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品类型模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsTypeCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsTypeCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsTypeEntity = new GoodsTypeEntity();
            $goodsTypeEntity->loadData($request);

            $goodsTypeBundleService = new GoodsTypeBundleService();
            $insertId = $goodsTypeBundleService->save($goodsTypeEntity->toArray());
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

    #[OA\Get(path: '/goodsType/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品类型模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsTypeResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsTypeBundleService = new GoodsTypeBundleService();
            $goodsType = $goodsTypeBundleService->getOne($condition);

            if (empty($goodsType)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsTypeResponse();
            $response->loadData($goodsType);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsType/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品类型模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsTypeUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsTypeUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsTypeBundleService = new GoodsTypeBundleService();
            $goodsType = $goodsTypeBundleService->getById($request['id']);
            if (empty($goodsType)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsTypeEntity = new GoodsTypeEntity();
            $goodsTypeEntity->loadData($request);

            $goodsTypeBundleService->update($goodsTypeEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsType/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品类型模块'])]
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

            $goodsTypeBundleService = new GoodsTypeBundleService();
            if ($goodsTypeBundleService->remove($condition)) {
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
