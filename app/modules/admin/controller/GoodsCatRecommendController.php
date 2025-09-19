<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsCatRecommendEntity;
use app\bundles\goods\service\GoodsCatRecommendBundleService;
use app\modules\admin\request\goodsCatRecommend\GoodsCatRecommendCreateRequest;
use app\modules\admin\request\goodsCatRecommend\GoodsCatRecommendQueryRequest;
use app\modules\admin\request\goodsCatRecommend\GoodsCatRecommendUpdateRequest;
use app\modules\admin\response\goodsCatRecommend\GoodsCatRecommendQueryResponse;
use app\modules\admin\response\goodsCatRecommend\GoodsCatRecommendResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsCatRecommendController extends BaseController
{
    #[OA\Post(path: '/goodsCatRecommend/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['分类推荐关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCatRecommendQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsCatRecommendQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsCatRecommendQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsCatRecommendBundleService = new GoodsCatRecommendBundleService;
            $result = $goodsCatRecommendBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsCatRecommendResponse;
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

    #[OA\Post(path: '/goodsCatRecommend/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['分类推荐关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCatRecommendCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCatRecommendCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsCatRecommendEntity = new GoodsCatRecommendEntity;
            $goodsCatRecommendEntity->loadData($request);

            $goodsCatRecommendBundleService = new GoodsCatRecommendBundleService;
            $insertId = $goodsCatRecommendBundleService->save($goodsCatRecommendEntity->toArray());
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

    #[OA\Get(path: '/goodsCatRecommend/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['分类推荐关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsCatRecommendResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsCatRecommendBundleService = new GoodsCatRecommendBundleService;
            $goodsCatRecommend = $goodsCatRecommendBundleService->getOne($condition);

            if (empty($goodsCatRecommend)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsCatRecommendResponse;
            $response->loadData($goodsCatRecommend);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsCatRecommend/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['分类推荐关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsCatRecommendUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsCatRecommendUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsCatRecommendBundleService = new GoodsCatRecommendBundleService;
            $goodsCatRecommend = $goodsCatRecommendBundleService->getById($request['id']);
            if (empty($goodsCatRecommend)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsCatRecommendEntity = new GoodsCatRecommendEntity;
            $goodsCatRecommendEntity->loadData($request);

            $goodsCatRecommendBundleService->update($goodsCatRecommendEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsCatRecommend/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['分类推荐关联模块'])]
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

            $goodsCatRecommendBundleService = new GoodsCatRecommendBundleService;
            if ($goodsCatRecommendBundleService->remove($condition)) {
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
