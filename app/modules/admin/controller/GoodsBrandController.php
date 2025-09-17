<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsBrandEntity;
use app\bundles\goods\service\GoodsBrandBundleService;
use app\modules\admin\request\goodsBrand\GoodsBrandCreateRequest;
use app\modules\admin\request\goodsBrand\GoodsBrandQueryRequest;
use app\modules\admin\request\goodsBrand\GoodsBrandUpdateRequest;
use app\modules\admin\response\goodsBrand\GoodsBrandQueryResponse;
use app\modules\admin\response\goodsBrand\GoodsBrandResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsBrandController extends BaseController
{
    #[OA\Post(path: '/goodsBrand/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品品牌模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsBrandQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsBrandQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsBrandQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsBrandBundleService = new GoodsBrandBundleService();
            $result = $goodsBrandBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsBrandResponse();
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

    #[OA\Post(path: '/goodsBrand/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品品牌模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsBrandCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsBrandCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsBrandEntity = new GoodsBrandEntity();
            $goodsBrandEntity->loadData($request);

            $goodsBrandBundleService = new GoodsBrandBundleService();
            $insertId = $goodsBrandBundleService->save($goodsBrandEntity->toArray());
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

    #[OA\Get(path: '/goodsBrand/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品品牌模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsBrandResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsBrandBundleService = new GoodsBrandBundleService();
            $goodsBrand = $goodsBrandBundleService->getOne($condition);

            if (empty($goodsBrand)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsBrandResponse();
            $response->loadData($goodsBrand);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsBrand/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品品牌模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsBrandUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsBrandUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsBrandBundleService = new GoodsBrandBundleService();
            $goodsBrand = $goodsBrandBundleService->getById($request['id']);
            if (empty($goodsBrand)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsBrandEntity = new GoodsBrandEntity();
            $goodsBrandEntity->loadData($request);

            $goodsBrandBundleService->update($goodsBrandEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsBrand/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品品牌模块'])]
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

            $goodsBrandBundleService = new GoodsBrandBundleService();
            if ($goodsBrandBundleService->remove($condition)) {
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
