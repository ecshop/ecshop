<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\activity\entity\ActivityPackageEntity;
use app\bundles\activity\service\ActivityPackageBundleService;
use app\modules\admin\request\activityPackage\ActivityPackageCreateRequest;
use app\modules\admin\request\activityPackage\ActivityPackageQueryRequest;
use app\modules\admin\request\activityPackage\ActivityPackageUpdateRequest;
use app\modules\admin\response\activityPackage\ActivityPackageQueryResponse;
use app\modules\admin\response\activityPackage\ActivityPackageResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ActivityPackageController extends BaseController
{
    #[OA\Post(path: '/activityPackage/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['礼包商品关联模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityPackageQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityPackageQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ActivityPackageQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $activityPackageBundleService = new ActivityPackageBundleService();
            $result = $activityPackageBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ActivityPackageResponse();
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

    #[OA\Post(path: '/activityPackage/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['礼包商品关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityPackageCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityPackageCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityPackageEntity = new ActivityPackageEntity();
            $activityPackageEntity->loadData($request);

            $activityPackageBundleService = new ActivityPackageBundleService();
            $insertId = $activityPackageBundleService->save($activityPackageEntity->toArray());
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

    #[OA\Get(path: '/activityPackage/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['礼包商品关联模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ActivityPackageResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $activityPackageBundleService = new ActivityPackageBundleService();
            $activityPackage = $activityPackageBundleService->getOne($condition);

            if (empty($activityPackage)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ActivityPackageResponse();
            $response->loadData($activityPackage);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/activityPackage/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['礼包商品关联模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ActivityPackageUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ActivityPackageUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $activityPackageBundleService = new ActivityPackageBundleService();
            $activityPackage = $activityPackageBundleService->getById($request['id']);
            if (empty($activityPackage)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $activityPackageEntity = new ActivityPackageEntity();
            $activityPackageEntity->loadData($request);

            $activityPackageBundleService->update($activityPackageEntity->toArray(), [
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

    #[OA\Delete(path: '/activityPackage/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['礼包商品关联模块'])]
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

            $activityPackageBundleService = new ActivityPackageBundleService();
            if ($activityPackageBundleService->remove($condition)) {
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
