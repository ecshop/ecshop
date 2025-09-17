<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsVirtualCardEntity;
use app\bundles\goods\service\GoodsVirtualCardBundleService;
use app\modules\admin\request\goodsVirtualCard\GoodsVirtualCardCreateRequest;
use app\modules\admin\request\goodsVirtualCard\GoodsVirtualCardQueryRequest;
use app\modules\admin\request\goodsVirtualCard\GoodsVirtualCardUpdateRequest;
use app\modules\admin\response\goodsVirtualCard\GoodsVirtualCardQueryResponse;
use app\modules\admin\response\goodsVirtualCard\GoodsVirtualCardResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsVirtualCardController extends BaseController
{
    #[OA\Post(path: '/goodsVirtualCard/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['虚拟卡数据模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsVirtualCardQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsVirtualCardQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsVirtualCardQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsVirtualCardBundleService = new GoodsVirtualCardBundleService();
            $result = $goodsVirtualCardBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsVirtualCardResponse();
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

    #[OA\Post(path: '/goodsVirtualCard/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['虚拟卡数据模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsVirtualCardCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsVirtualCardCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsVirtualCardEntity = new GoodsVirtualCardEntity();
            $goodsVirtualCardEntity->loadData($request);

            $goodsVirtualCardBundleService = new GoodsVirtualCardBundleService();
            $insertId = $goodsVirtualCardBundleService->save($goodsVirtualCardEntity->toArray());
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

    #[OA\Get(path: '/goodsVirtualCard/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['虚拟卡数据模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsVirtualCardResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsVirtualCardBundleService = new GoodsVirtualCardBundleService();
            $goodsVirtualCard = $goodsVirtualCardBundleService->getOne($condition);

            if (empty($goodsVirtualCard)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsVirtualCardResponse();
            $response->loadData($goodsVirtualCard);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsVirtualCard/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['虚拟卡数据模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsVirtualCardUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsVirtualCardUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsVirtualCardBundleService = new GoodsVirtualCardBundleService();
            $goodsVirtualCard = $goodsVirtualCardBundleService->getById($request['id']);
            if (empty($goodsVirtualCard)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsVirtualCardEntity = new GoodsVirtualCardEntity();
            $goodsVirtualCardEntity->loadData($request);

            $goodsVirtualCardBundleService->update($goodsVirtualCardEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsVirtualCard/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['虚拟卡数据模块'])]
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

            $goodsVirtualCardBundleService = new GoodsVirtualCardBundleService();
            if ($goodsVirtualCardBundleService->remove($condition)) {
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
