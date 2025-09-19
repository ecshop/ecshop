<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserRankEntity;
use app\bundles\user\service\UserRankBundleService;
use app\modules\admin\request\userRank\UserRankCreateRequest;
use app\modules\admin\request\userRank\UserRankQueryRequest;
use app\modules\admin\request\userRank\UserRankUpdateRequest;
use app\modules\admin\response\userRank\UserRankQueryResponse;
use app\modules\admin\response\userRank\UserRankResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserRankController extends BaseController
{
    #[OA\Post(path: '/userRank/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户等级模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserRankQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserRankQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserRankQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userRankBundleService = new UserRankBundleService;
            $result = $userRankBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserRankResponse;
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

    #[OA\Post(path: '/userRank/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户等级模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserRankCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserRankCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userRankEntity = new UserRankEntity;
            $userRankEntity->loadData($request);

            $userRankBundleService = new UserRankBundleService;
            $insertId = $userRankBundleService->save($userRankEntity->toArray());
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

    #[OA\Get(path: '/userRank/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户等级模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserRankResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userRankBundleService = new UserRankBundleService;
            $userRank = $userRankBundleService->getOne($condition);

            if (empty($userRank)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserRankResponse;
            $response->loadData($userRank);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userRank/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户等级模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserRankUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserRankUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userRankBundleService = new UserRankBundleService;
            $userRank = $userRankBundleService->getById($request['id']);
            if (empty($userRank)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userRankEntity = new UserRankEntity;
            $userRankEntity->loadData($request);

            $userRankBundleService->update($userRankEntity->toArray(), [
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

    #[OA\Delete(path: '/userRank/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户等级模块'])]
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

            $userRankBundleService = new UserRankBundleService;
            if ($userRankBundleService->remove($condition)) {
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
