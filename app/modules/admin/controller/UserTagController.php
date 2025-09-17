<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserTagEntity;
use app\bundles\user\service\UserTagBundleService;
use app\modules\admin\request\userTag\UserTagCreateRequest;
use app\modules\admin\request\userTag\UserTagQueryRequest;
use app\modules\admin\request\userTag\UserTagUpdateRequest;
use app\modules\admin\response\userTag\UserTagQueryResponse;
use app\modules\admin\response\userTag\UserTagResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserTagController extends BaseController
{
    #[OA\Post(path: '/userTag/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品标签模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserTagQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserTagQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserTagQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userTagBundleService = new UserTagBundleService();
            $result = $userTagBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserTagResponse();
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

    #[OA\Post(path: '/userTag/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品标签模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserTagCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserTagCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userTagEntity = new UserTagEntity();
            $userTagEntity->loadData($request);

            $userTagBundleService = new UserTagBundleService();
            $insertId = $userTagBundleService->save($userTagEntity->toArray());
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

    #[OA\Get(path: '/userTag/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品标签模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserTagResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userTagBundleService = new UserTagBundleService();
            $userTag = $userTagBundleService->getOne($condition);

            if (empty($userTag)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserTagResponse();
            $response->loadData($userTag);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userTag/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品标签模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserTagUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserTagUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userTagBundleService = new UserTagBundleService();
            $userTag = $userTagBundleService->getById($request['id']);
            if (empty($userTag)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userTagEntity = new UserTagEntity();
            $userTagEntity->loadData($request);

            $userTagBundleService->update($userTagEntity->toArray(), [
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

    #[OA\Delete(path: '/userTag/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品标签模块'])]
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

            $userTagBundleService = new UserTagBundleService();
            if ($userTagBundleService->remove($condition)) {
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
