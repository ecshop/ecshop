<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shipping\entity\ShippingAreaEntity;
use app\bundles\shipping\service\ShippingAreaBundleService;
use app\modules\admin\request\shippingArea\ShippingAreaCreateRequest;
use app\modules\admin\request\shippingArea\ShippingAreaQueryRequest;
use app\modules\admin\request\shippingArea\ShippingAreaUpdateRequest;
use app\modules\admin\response\shippingArea\ShippingAreaQueryResponse;
use app\modules\admin\response\shippingArea\ShippingAreaResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShippingAreaController extends BaseController
{
    #[OA\Post(path: '/shippingArea/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['配送区域模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingAreaQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShippingAreaQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShippingAreaQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shippingAreaBundleService = new ShippingAreaBundleService();
            $result = $shippingAreaBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShippingAreaResponse();
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

    #[OA\Post(path: '/shippingArea/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['配送区域模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingAreaCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShippingAreaCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shippingAreaEntity = new ShippingAreaEntity();
            $shippingAreaEntity->loadData($request);

            $shippingAreaBundleService = new ShippingAreaBundleService();
            $insertId = $shippingAreaBundleService->save($shippingAreaEntity->toArray());
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

    #[OA\Get(path: '/shippingArea/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['配送区域模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShippingAreaResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shippingAreaBundleService = new ShippingAreaBundleService();
            $shippingArea = $shippingAreaBundleService->getOne($condition);

            if (empty($shippingArea)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShippingAreaResponse();
            $response->loadData($shippingArea);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shippingArea/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['配送区域模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingAreaUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShippingAreaUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shippingAreaBundleService = new ShippingAreaBundleService();
            $shippingArea = $shippingAreaBundleService->getById($request['id']);
            if (empty($shippingArea)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shippingAreaEntity = new ShippingAreaEntity();
            $shippingAreaEntity->loadData($request);

            $shippingAreaBundleService->update($shippingAreaEntity->toArray(), [
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

    #[OA\Delete(path: '/shippingArea/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['配送区域模块'])]
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

            $shippingAreaBundleService = new ShippingAreaBundleService();
            if ($shippingAreaBundleService->remove($condition)) {
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
