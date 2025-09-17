<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsCatEntity;
use app\bundles\goods\service\GoodsCatBundleService;
use app\modules\admin\request\goodsCat\GoodsCatCreateRequest;
use app\modules\admin\request\goodsCat\GoodsCatQueryRequest;
use app\modules\admin\request\goodsCat\GoodsCatUpdateRequest;
use app\modules\admin\response\goodsCat\GoodsCatQueryResponse;
use app\modules\admin\response\goodsCat\GoodsCatResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsCatController extends BaseController
{
    #[OA\Post(path: '/goodsCat/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品分类关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCatQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsCatQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsCatQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsCatBundleService = new GoodsCatBundleService();
            $result = $goodsCatBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsCatResponse();
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

    #[OA\Post(path: '/goodsCat/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品分类关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCatCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCatCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsCatEntity = new GoodsCatEntity();
            $goodsCatEntity->loadData($request);

            $goodsCatBundleService = new GoodsCatBundleService();
            $insertId = $goodsCatBundleService->save($goodsCatEntity->toArray());
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

    #[OA\Get(path: '/goodsCat/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品分类关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsCatResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsCatBundleService = new GoodsCatBundleService();
            $goodsCat = $goodsCatBundleService->getOne($condition);

            if (empty($goodsCat)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsCatResponse();
            $response->loadData($goodsCat);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsCat/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品分类关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCatUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCatUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsCatBundleService = new GoodsCatBundleService();
            $goodsCat = $goodsCatBundleService->getById($request['id']);
            if (empty($goodsCat)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsCatEntity = new GoodsCatEntity();
            $goodsCatEntity->loadData($request);

            $goodsCatBundleService->update($goodsCatEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsCat/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品分类关联模块'])]
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

            $goodsCatBundleService = new GoodsCatBundleService();
            if ($goodsCatBundleService->remove($condition)) {
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
