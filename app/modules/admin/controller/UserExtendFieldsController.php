<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserExtendFieldsEntity;
use app\bundles\user\service\UserExtendFieldsBundleService;
use app\modules\admin\request\userExtendFields\UserExtendFieldsCreateRequest;
use app\modules\admin\request\userExtendFields\UserExtendFieldsQueryRequest;
use app\modules\admin\request\userExtendFields\UserExtendFieldsUpdateRequest;
use app\modules\admin\response\userExtendFields\UserExtendFieldsQueryResponse;
use app\modules\admin\response\userExtendFields\UserExtendFieldsResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserExtendFieldsController extends BaseController
{
    #[OA\Post(path: '/userExtendFields/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展字段模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserExtendFieldsQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserExtendFieldsQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserExtendFieldsQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userExtendFieldsBundleService = new UserExtendFieldsBundleService();
            $result = $userExtendFieldsBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserExtendFieldsResponse();
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

    #[OA\Post(path: '/userExtendFields/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展字段模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserExtendFieldsCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserExtendFieldsCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userExtendFieldsEntity = new UserExtendFieldsEntity();
            $userExtendFieldsEntity->loadData($request);

            $userExtendFieldsBundleService = new UserExtendFieldsBundleService();
            $insertId = $userExtendFieldsBundleService->save($userExtendFieldsEntity->toArray());
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

    #[OA\Get(path: '/userExtendFields/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展字段模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserExtendFieldsResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userExtendFieldsBundleService = new UserExtendFieldsBundleService();
            $userExtendFields = $userExtendFieldsBundleService->getOne($condition);

            if (empty($userExtendFields)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserExtendFieldsResponse();
            $response->loadData($userExtendFields);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userExtendFields/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展字段模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserExtendFieldsUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserExtendFieldsUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userExtendFieldsBundleService = new UserExtendFieldsBundleService();
            $userExtendFields = $userExtendFieldsBundleService->getById($request['id']);
            if (empty($userExtendFields)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userExtendFieldsEntity = new UserExtendFieldsEntity();
            $userExtendFieldsEntity->loadData($request);

            $userExtendFieldsBundleService->update($userExtendFieldsEntity->toArray(), [
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

    #[OA\Delete(path: '/userExtendFields/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户注册扩展字段模块'])]
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

            $userExtendFieldsBundleService = new UserExtendFieldsBundleService();
            if ($userExtendFieldsBundleService->remove($condition)) {
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
