<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shipping\entity\ShippingAreaRegionEntity;
use app\bundles\shipping\service\ShippingAreaRegionBundleService;
use app\modules\admin\request\shippingAreaRegion\ShippingAreaRegionCreateRequest;
use app\modules\admin\request\shippingAreaRegion\ShippingAreaRegionQueryRequest;
use app\modules\admin\request\shippingAreaRegion\ShippingAreaRegionUpdateRequest;
use app\modules\admin\response\shippingAreaRegion\ShippingAreaRegionQueryResponse;
use app\modules\admin\response\shippingAreaRegion\ShippingAreaRegionResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShippingAreaRegionController extends BaseController
{
    #[OA\Post(path: '/shippingAreaRegion/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['配送区域关联地区模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingAreaRegionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShippingAreaRegionQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShippingAreaRegionQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shippingAreaRegionBundleService = new ShippingAreaRegionBundleService();
            $result = $shippingAreaRegionBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShippingAreaRegionResponse();
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

    #[OA\Post(path: '/shippingAreaRegion/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['配送区域关联地区模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingAreaRegionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShippingAreaRegionCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shippingAreaRegionEntity = new ShippingAreaRegionEntity();
            $shippingAreaRegionEntity->loadData($request);

            $shippingAreaRegionBundleService = new ShippingAreaRegionBundleService();
            $insertId = $shippingAreaRegionBundleService->save($shippingAreaRegionEntity->toArray());
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

    #[OA\Get(path: '/shippingAreaRegion/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['配送区域关联地区模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShippingAreaRegionResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shippingAreaRegionBundleService = new ShippingAreaRegionBundleService();
            $shippingAreaRegion = $shippingAreaRegionBundleService->getOne($condition);

            if (empty($shippingAreaRegion)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShippingAreaRegionResponse();
            $response->loadData($shippingAreaRegion);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shippingAreaRegion/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['配送区域关联地区模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShippingAreaRegionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShippingAreaRegionUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shippingAreaRegionBundleService = new ShippingAreaRegionBundleService();
            $shippingAreaRegion = $shippingAreaRegionBundleService->getById($request['id']);
            if (empty($shippingAreaRegion)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shippingAreaRegionEntity = new ShippingAreaRegionEntity();
            $shippingAreaRegionEntity->loadData($request);

            $shippingAreaRegionBundleService->update($shippingAreaRegionEntity->toArray(), [
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

    #[OA\Delete(path: '/shippingAreaRegion/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['配送区域关联地区模块'])]
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

            $shippingAreaRegionBundleService = new ShippingAreaRegionBundleService();
            if ($shippingAreaRegionBundleService->remove($condition)) {
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
