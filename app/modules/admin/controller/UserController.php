<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserEntity;
use app\bundles\user\service\UserBundleService;
use app\modules\admin\request\user\UserCreateRequest;
use app\modules\admin\request\user\UserQueryRequest;
use app\modules\admin\request\user\UserUpdateRequest;
use app\modules\admin\response\user\UserQueryResponse;
use app\modules\admin\response\user\UserResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserController extends BaseController
{
    #[OA\Post(path: '/user/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userBundleService = new UserBundleService();
            $result = $userBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserResponse();
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

    #[OA\Post(path: '/user/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userEntity = new UserEntity();
            $userEntity->loadData($request);

            $userBundleService = new UserBundleService();
            $insertId = $userBundleService->save($userEntity->toArray());
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

    #[OA\Get(path: '/user/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userBundleService = new UserBundleService();
            $user = $userBundleService->getOne($condition);

            if (empty($user)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserResponse();
            $response->loadData($user);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/user/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userBundleService = new UserBundleService();
            $user = $userBundleService->getById($request['id']);
            if (empty($user)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userEntity = new UserEntity();
            $userEntity->loadData($request);

            $userBundleService->update($userEntity->toArray(), [
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

    #[OA\Delete(path: '/user/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户模块'])]
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

            $userBundleService = new UserBundleService();
            if ($userBundleService->remove($condition)) {
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
