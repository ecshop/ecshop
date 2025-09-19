<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\goods\entity\GoodsMemberPriceEntity;
use app\bundles\goods\service\GoodsMemberPriceBundleService;
use app\modules\admin\request\goodsMemberPrice\GoodsMemberPriceCreateRequest;
use app\modules\admin\request\goodsMemberPrice\GoodsMemberPriceQueryRequest;
use app\modules\admin\request\goodsMemberPrice\GoodsMemberPriceUpdateRequest;
use app\modules\admin\response\goodsMemberPrice\GoodsMemberPriceQueryResponse;
use app\modules\admin\response\goodsMemberPrice\GoodsMemberPriceResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class GoodsMemberPriceController extends BaseController
{
    #[OA\Post(path: '/goodsMemberPrice/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['会员价格模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsMemberPriceQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsMemberPriceQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new GoodsMemberPriceQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $goodsMemberPriceBundleService = new GoodsMemberPriceBundleService;
            $result = $goodsMemberPriceBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new GoodsMemberPriceResponse;
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

    #[OA\Post(path: '/goodsMemberPrice/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['会员价格模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsMemberPriceCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsMemberPriceCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsMemberPriceEntity = new GoodsMemberPriceEntity;
            $goodsMemberPriceEntity->loadData($request);

            $goodsMemberPriceBundleService = new GoodsMemberPriceBundleService;
            $insertId = $goodsMemberPriceBundleService->save($goodsMemberPriceEntity->toArray());
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

    #[OA\Get(path: '/goodsMemberPrice/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['会员价格模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: GoodsMemberPriceResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $goodsMemberPriceBundleService = new GoodsMemberPriceBundleService;
            $goodsMemberPrice = $goodsMemberPriceBundleService->getOne($condition);

            if (empty($goodsMemberPrice)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new GoodsMemberPriceResponse;
            $response->loadData($goodsMemberPrice);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/goodsMemberPrice/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['会员价格模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: GoodsMemberPriceUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new GoodsMemberPriceUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $goodsMemberPriceBundleService = new GoodsMemberPriceBundleService;
            $goodsMemberPrice = $goodsMemberPriceBundleService->getById($request['id']);
            if (empty($goodsMemberPrice)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $goodsMemberPriceEntity = new GoodsMemberPriceEntity;
            $goodsMemberPriceEntity->loadData($request);

            $goodsMemberPriceBundleService->update($goodsMemberPriceEntity->toArray(), [
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

    #[OA\Delete(path: '/goodsMemberPrice/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['会员价格模块'])]
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

            $goodsMemberPriceBundleService = new GoodsMemberPriceBundleService;
            if ($goodsMemberPriceBundleService->remove($condition)) {
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
