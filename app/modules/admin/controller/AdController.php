<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\ad\entity\AdEntity;
use app\bundles\ad\service\AdBundleService;
use app\modules\admin\request\ad\AdCreateRequest;
use app\modules\admin\request\ad\AdQueryRequest;
use app\modules\admin\request\ad\AdUpdateRequest;
use app\modules\admin\response\ad\AdQueryResponse;
use app\modules\admin\response\ad\AdResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdController extends BaseController
{
    #[OA\Post(path: '/ad/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['广告模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adBundleService = new AdBundleService();
            $result = $adBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdResponse();
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

    #[OA\Post(path: '/ad/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['广告模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adEntity = new AdEntity();
            $adEntity->loadData($request);

            $adBundleService = new AdBundleService();
            $insertId = $adBundleService->save($adEntity->toArray());
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

    #[OA\Get(path: '/ad/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['广告模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adBundleService = new AdBundleService();
            $ad = $adBundleService->getOne($condition);

            if (empty($ad)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdResponse();
            $response->loadData($ad);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/ad/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['广告模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adBundleService = new AdBundleService();
            $ad = $adBundleService->getById($request['id']);
            if (empty($ad)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adEntity = new AdEntity();
            $adEntity->loadData($request);

            $adBundleService->update($adEntity->toArray(), [
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

    #[OA\Delete(path: '/ad/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['广告模块'])]
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

            $adBundleService = new AdBundleService();
            if ($adBundleService->remove($condition)) {
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
