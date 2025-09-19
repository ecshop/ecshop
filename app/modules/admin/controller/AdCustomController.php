<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\ad\entity\AdCustomEntity;
use app\bundles\ad\service\AdCustomBundleService;
use app\modules\admin\request\adCustom\AdCustomCreateRequest;
use app\modules\admin\request\adCustom\AdCustomQueryRequest;
use app\modules\admin\request\adCustom\AdCustomUpdateRequest;
use app\modules\admin\response\adCustom\AdCustomQueryResponse;
use app\modules\admin\response\adCustom\AdCustomResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdCustomController extends BaseController
{
    #[OA\Post(path: '/adCustom/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['自定义广告模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdCustomQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdCustomQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdCustomQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adCustomBundleService = new AdCustomBundleService;
            $result = $adCustomBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdCustomResponse;
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

    #[OA\Post(path: '/adCustom/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['自定义广告模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdCustomCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdCustomCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adCustomEntity = new AdCustomEntity;
            $adCustomEntity->loadData($request);

            $adCustomBundleService = new AdCustomBundleService;
            $insertId = $adCustomBundleService->save($adCustomEntity->toArray());
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

    #[OA\Get(path: '/adCustom/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['自定义广告模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdCustomResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adCustomBundleService = new AdCustomBundleService;
            $adCustom = $adCustomBundleService->getOne($condition);

            if (empty($adCustom)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdCustomResponse;
            $response->loadData($adCustom);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adCustom/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['自定义广告模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdCustomUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdCustomUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adCustomBundleService = new AdCustomBundleService;
            $adCustom = $adCustomBundleService->getById($request['id']);
            if (empty($adCustom)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adCustomEntity = new AdCustomEntity;
            $adCustomEntity->loadData($request);

            $adCustomBundleService->update($adCustomEntity->toArray(), [
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

    #[OA\Delete(path: '/adCustom/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['自定义广告模块'])]
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

            $adCustomBundleService = new AdCustomBundleService;
            if ($adCustomBundleService->remove($condition)) {
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
