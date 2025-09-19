<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserCollectEntity;
use app\bundles\user\service\UserCollectBundleService;
use app\modules\admin\request\userCollect\UserCollectCreateRequest;
use app\modules\admin\request\userCollect\UserCollectQueryRequest;
use app\modules\admin\request\userCollect\UserCollectUpdateRequest;
use app\modules\admin\response\userCollect\UserCollectQueryResponse;
use app\modules\admin\response\userCollect\UserCollectResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserCollectController extends BaseController
{
    #[OA\Post(path: '/userCollect/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品收藏模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCollectQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserCollectQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserCollectQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userCollectBundleService = new UserCollectBundleService;
            $result = $userCollectBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserCollectResponse;
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

    #[OA\Post(path: '/userCollect/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品收藏模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCollectCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserCollectCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userCollectEntity = new UserCollectEntity;
            $userCollectEntity->loadData($request);

            $userCollectBundleService = new UserCollectBundleService;
            $insertId = $userCollectBundleService->save($userCollectEntity->toArray());
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

    #[OA\Get(path: '/userCollect/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品收藏模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserCollectResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userCollectBundleService = new UserCollectBundleService;
            $userCollect = $userCollectBundleService->getOne($condition);

            if (empty($userCollect)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserCollectResponse;
            $response->loadData($userCollect);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userCollect/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品收藏模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCollectUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserCollectUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userCollectBundleService = new UserCollectBundleService;
            $userCollect = $userCollectBundleService->getById($request['id']);
            if (empty($userCollect)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userCollectEntity = new UserCollectEntity;
            $userCollectEntity->loadData($request);

            $userCollectBundleService->update($userCollectEntity->toArray(), [
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

    #[OA\Delete(path: '/userCollect/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品收藏模块'])]
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

            $userCollectBundleService = new UserCollectBundleService;
            if ($userCollectBundleService->remove($condition)) {
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
