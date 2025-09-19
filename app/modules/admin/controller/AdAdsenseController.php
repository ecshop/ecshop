<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\ad\entity\AdAdsenseEntity;
use app\bundles\ad\service\AdAdsenseBundleService;
use app\modules\admin\request\adAdsense\AdAdsenseCreateRequest;
use app\modules\admin\request\adAdsense\AdAdsenseQueryRequest;
use app\modules\admin\request\adAdsense\AdAdsenseUpdateRequest;
use app\modules\admin\response\adAdsense\AdAdsenseQueryResponse;
use app\modules\admin\response\adAdsense\AdAdsenseResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdAdsenseController extends BaseController
{
    #[OA\Post(path: '/adAdsense/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['广告点击统计模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdAdsenseQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdAdsenseQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdAdsenseQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adAdsenseBundleService = new AdAdsenseBundleService;
            $result = $adAdsenseBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdAdsenseResponse;
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

    #[OA\Post(path: '/adAdsense/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['广告点击统计模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdAdsenseCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdAdsenseCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adAdsenseEntity = new AdAdsenseEntity;
            $adAdsenseEntity->loadData($request);

            $adAdsenseBundleService = new AdAdsenseBundleService;
            $insertId = $adAdsenseBundleService->save($adAdsenseEntity->toArray());
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

    #[OA\Get(path: '/adAdsense/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['广告点击统计模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdAdsenseResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adAdsenseBundleService = new AdAdsenseBundleService;
            $adAdsense = $adAdsenseBundleService->getOne($condition);

            if (empty($adAdsense)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdAdsenseResponse;
            $response->loadData($adAdsense);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adAdsense/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['广告点击统计模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdAdsenseUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdAdsenseUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adAdsenseBundleService = new AdAdsenseBundleService;
            $adAdsense = $adAdsenseBundleService->getById($request['id']);
            if (empty($adAdsense)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adAdsenseEntity = new AdAdsenseEntity;
            $adAdsenseEntity->loadData($request);

            $adAdsenseBundleService->update($adAdsenseEntity->toArray(), [
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

    #[OA\Delete(path: '/adAdsense/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['广告点击统计模块'])]
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

            $adAdsenseBundleService = new AdAdsenseBundleService;
            if ($adAdsenseBundleService->remove($condition)) {
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
