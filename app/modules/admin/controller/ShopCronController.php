<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopCronEntity;
use app\bundles\shop\service\ShopCronBundleService;
use app\modules\admin\request\shopCron\ShopCronCreateRequest;
use app\modules\admin\request\shopCron\ShopCronQueryRequest;
use app\modules\admin\request\shopCron\ShopCronUpdateRequest;
use app\modules\admin\response\shopCron\ShopCronQueryResponse;
use app\modules\admin\response\shopCron\ShopCronResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopCronController extends BaseController
{
    #[OA\Post(path: '/shopCron/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['计划任务模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopCronQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopCronQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopCronQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopCronBundleService = new ShopCronBundleService();
            $result = $shopCronBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopCronResponse();
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

    #[OA\Post(path: '/shopCron/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['计划任务模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopCronCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopCronCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopCronEntity = new ShopCronEntity();
            $shopCronEntity->loadData($request);

            $shopCronBundleService = new ShopCronBundleService();
            $insertId = $shopCronBundleService->save($shopCronEntity->toArray());
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

    #[OA\Get(path: '/shopCron/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['计划任务模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopCronResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopCronBundleService = new ShopCronBundleService();
            $shopCron = $shopCronBundleService->getOne($condition);

            if (empty($shopCron)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopCronResponse();
            $response->loadData($shopCron);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopCron/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['计划任务模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopCronUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopCronUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopCronBundleService = new ShopCronBundleService();
            $shopCron = $shopCronBundleService->getById($request['id']);
            if (empty($shopCron)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopCronEntity = new ShopCronEntity();
            $shopCronEntity->loadData($request);

            $shopCronBundleService->update($shopCronEntity->toArray(), [
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

    #[OA\Delete(path: '/shopCron/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['计划任务模块'])]
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

            $shopCronBundleService = new ShopCronBundleService();
            if ($shopCronBundleService->remove($condition)) {
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
