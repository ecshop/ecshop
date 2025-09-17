<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shipping\entity\ShippingEntity;
use app\bundles\shipping\service\ShippingBundleService;
use app\modules\admin\request\shipping\ShippingCreateRequest;
use app\modules\admin\request\shipping\ShippingQueryRequest;
use app\modules\admin\request\shipping\ShippingUpdateRequest;
use app\modules\admin\response\shipping\ShippingQueryResponse;
use app\modules\admin\response\shipping\ShippingResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShippingController extends BaseController
{
    #[OA\Post(path: '/shipping/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['配送方式模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShippingQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShippingQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shippingBundleService = new ShippingBundleService();
            $result = $shippingBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShippingResponse();
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

    #[OA\Post(path: '/shipping/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['配送方式模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShippingCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shippingEntity = new ShippingEntity();
            $shippingEntity->loadData($request);

            $shippingBundleService = new ShippingBundleService();
            $insertId = $shippingBundleService->save($shippingEntity->toArray());
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

    #[OA\Get(path: '/shipping/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['配送方式模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShippingResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shippingBundleService = new ShippingBundleService();
            $shipping = $shippingBundleService->getOne($condition);

            if (empty($shipping)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShippingResponse();
            $response->loadData($shipping);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shipping/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['配送方式模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShippingUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shippingBundleService = new ShippingBundleService();
            $shipping = $shippingBundleService->getById($request['id']);
            if (empty($shipping)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shippingEntity = new ShippingEntity();
            $shippingEntity->loadData($request);

            $shippingBundleService->update($shippingEntity->toArray(), [
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

    #[OA\Delete(path: '/shipping/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['配送方式模块'])]
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

            $shippingBundleService = new ShippingBundleService();
            if ($shippingBundleService->remove($condition)) {
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
