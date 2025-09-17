<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserFeedEntity;
use app\bundles\user\service\UserFeedBundleService;
use app\modules\admin\request\userFeed\UserFeedCreateRequest;
use app\modules\admin\request\userFeed\UserFeedQueryRequest;
use app\modules\admin\request\userFeed\UserFeedUpdateRequest;
use app\modules\admin\response\userFeed\UserFeedQueryResponse;
use app\modules\admin\response\userFeed\UserFeedResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserFeedController extends BaseController
{
    #[OA\Post(path: '/userFeed/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserFeedQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserFeedQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserFeedQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userFeedBundleService = new UserFeedBundleService();
            $result = $userFeedBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserFeedResponse();
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

    #[OA\Post(path: '/userFeed/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserFeedCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserFeedCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userFeedEntity = new UserFeedEntity();
            $userFeedEntity->loadData($request);

            $userFeedBundleService = new UserFeedBundleService();
            $insertId = $userFeedBundleService->save($userFeedEntity->toArray());
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

    #[OA\Get(path: '/userFeed/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserFeedResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userFeedBundleService = new UserFeedBundleService();
            $userFeed = $userFeedBundleService->getOne($condition);

            if (empty($userFeed)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserFeedResponse();
            $response->loadData($userFeed);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userFeed/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserFeedUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserFeedUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userFeedBundleService = new UserFeedBundleService();
            $userFeed = $userFeedBundleService->getById($request['id']);
            if (empty($userFeed)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userFeedEntity = new UserFeedEntity();
            $userFeedEntity->loadData($request);

            $userFeedBundleService->update($userFeedEntity->toArray(), [
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

    #[OA\Delete(path: '/userFeed/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
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

            $userFeedBundleService = new UserFeedBundleService();
            if ($userFeedBundleService->remove($condition)) {
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
