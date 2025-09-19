<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserExtendInfoEntity;
use app\bundles\user\service\UserExtendInfoBundleService;
use app\modules\admin\request\userExtendInfo\UserExtendInfoCreateRequest;
use app\modules\admin\request\userExtendInfo\UserExtendInfoQueryRequest;
use app\modules\admin\request\userExtendInfo\UserExtendInfoUpdateRequest;
use app\modules\admin\response\userExtendInfo\UserExtendInfoQueryResponse;
use app\modules\admin\response\userExtendInfo\UserExtendInfoResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserExtendInfoController extends BaseController
{
    #[OA\Post(path: '/userExtendInfo/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展信息模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserExtendInfoQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserExtendInfoQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserExtendInfoQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userExtendInfoBundleService = new UserExtendInfoBundleService;
            $result = $userExtendInfoBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserExtendInfoResponse;
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

    #[OA\Post(path: '/userExtendInfo/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserExtendInfoCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserExtendInfoCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userExtendInfoEntity = new UserExtendInfoEntity;
            $userExtendInfoEntity->loadData($request);

            $userExtendInfoBundleService = new UserExtendInfoBundleService;
            $insertId = $userExtendInfoBundleService->save($userExtendInfoEntity->toArray());
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

    #[OA\Get(path: '/userExtendInfo/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展信息模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserExtendInfoResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userExtendInfoBundleService = new UserExtendInfoBundleService;
            $userExtendInfo = $userExtendInfoBundleService->getOne($condition);

            if (empty($userExtendInfo)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserExtendInfoResponse;
            $response->loadData($userExtendInfo);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userExtendInfo/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展信息模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserExtendInfoUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserExtendInfoUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userExtendInfoBundleService = new UserExtendInfoBundleService;
            $userExtendInfo = $userExtendInfoBundleService->getById($request['id']);
            if (empty($userExtendInfo)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userExtendInfoEntity = new UserExtendInfoEntity;
            $userExtendInfoEntity->loadData($request);

            $userExtendInfoBundleService->update($userExtendInfoEntity->toArray(), [
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

    #[OA\Delete(path: '/userExtendInfo/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展信息模块'])]
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

            $userExtendInfoBundleService = new UserExtendInfoBundleService;
            if ($userExtendInfoBundleService->remove($condition)) {
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
