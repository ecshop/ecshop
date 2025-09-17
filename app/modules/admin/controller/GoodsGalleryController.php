<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsGalleryEntity;
use app\bundles\goods\service\GoodsGalleryBundleService;
use app\modules\admin\request\goodsGallery\GoodsGalleryCreateRequest;
use app\modules\admin\request\goodsGallery\GoodsGalleryQueryRequest;
use app\modules\admin\request\goodsGallery\GoodsGalleryUpdateRequest;
use app\modules\admin\response\goodsGallery\GoodsGalleryQueryResponse;
use app\modules\admin\response\goodsGallery\GoodsGalleryResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsGalleryController extends BaseController
{
    #[OA\Post(path: '/goodsGallery/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品相册模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsGalleryQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsGalleryBundleService = new GoodsGalleryBundleService();
            $result = $goodsGalleryBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsGalleryResponse();
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

    #[OA\Post(path: '/goodsGallery/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品相册模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsGalleryCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsGalleryEntity = new GoodsGalleryEntity();
            $goodsGalleryEntity->loadData($request);

            $goodsGalleryBundleService = new GoodsGalleryBundleService();
            $insertId = $goodsGalleryBundleService->save($goodsGalleryEntity->toArray());
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

    #[OA\Get(path: '/goodsGallery/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品相册模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsGalleryResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsGalleryBundleService = new GoodsGalleryBundleService();
            $goodsGallery = $goodsGalleryBundleService->getOne($condition);

            if (empty($goodsGallery)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsGalleryResponse();
            $response->loadData($goodsGallery);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsGallery/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品相册模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsGalleryUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsGalleryUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsGalleryBundleService = new GoodsGalleryBundleService();
            $goodsGallery = $goodsGalleryBundleService->getById($request['id']);
            if (empty($goodsGallery)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsGalleryEntity = new GoodsGalleryEntity();
            $goodsGalleryEntity->loadData($request);

            $goodsGalleryBundleService->update($goodsGalleryEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsGallery/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品相册模块'])]
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

            $goodsGalleryBundleService = new GoodsGalleryBundleService();
            if ($goodsGalleryBundleService->remove($condition)) {
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
