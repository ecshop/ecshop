<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\supplier\entity\SupplierEntity;
use app\bundles\supplier\service\SupplierBundleService;
use app\modules\admin\request\supplier\SupplierCreateRequest;
use app\modules\admin\request\supplier\SupplierQueryRequest;
use app\modules\admin\request\supplier\SupplierUpdateRequest;
use app\modules\admin\response\supplier\SupplierQueryResponse;
use app\modules\admin\response\supplier\SupplierResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class SupplierController extends BaseController
{
    #[OA\Post(path: '/supplier/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['供应商信息模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SupplierQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SupplierQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new SupplierQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $supplierBundleService = new SupplierBundleService;
            $result = $supplierBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new SupplierResponse;
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

    #[OA\Post(path: '/supplier/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['供应商信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SupplierCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new SupplierCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $supplierEntity = new SupplierEntity;
            $supplierEntity->loadData($request);

            $supplierBundleService = new SupplierBundleService;
            $insertId = $supplierBundleService->save($supplierEntity->toArray());
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

    #[OA\Get(path: '/supplier/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['供应商信息模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: SupplierResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $supplierBundleService = new SupplierBundleService;
            $supplier = $supplierBundleService->getOne($condition);

            if (empty($supplier)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new SupplierResponse;
            $response->loadData($supplier);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/supplier/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['供应商信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: SupplierUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new SupplierUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $supplierBundleService = new SupplierBundleService;
            $supplier = $supplierBundleService->getById($request['id']);
            if (empty($supplier)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $supplierEntity = new SupplierEntity;
            $supplierEntity->loadData($request);

            $supplierBundleService->update($supplierEntity->toArray(), [
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

    #[OA\Delete(path: '/supplier/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['供应商信息模块'])]
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

            $supplierBundleService = new SupplierBundleService;
            if ($supplierBundleService->remove($condition)) {
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
