<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserAccountEntity;
use app\bundles\user\service\UserAccountBundleService;
use app\modules\admin\request\userAccount\UserAccountCreateRequest;
use app\modules\admin\request\userAccount\UserAccountQueryRequest;
use app\modules\admin\request\userAccount\UserAccountUpdateRequest;
use app\modules\admin\response\userAccount\UserAccountQueryResponse;
use app\modules\admin\response\userAccount\UserAccountResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserAccountController extends BaseController
{
    #[OA\Post(path: '/userAccount/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户资金账户模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAccountQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAccountQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserAccountQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userAccountBundleService = new UserAccountBundleService();
            $result = $userAccountBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserAccountResponse();
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

    #[OA\Post(path: '/userAccount/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户资金账户模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAccountCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAccountCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAccountEntity = new UserAccountEntity();
            $userAccountEntity->loadData($request);

            $userAccountBundleService = new UserAccountBundleService();
            $insertId = $userAccountBundleService->save($userAccountEntity->toArray());
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

    #[OA\Get(path: '/userAccount/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户资金账户模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAccountResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userAccountBundleService = new UserAccountBundleService();
            $userAccount = $userAccountBundleService->getOne($condition);

            if (empty($userAccount)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserAccountResponse();
            $response->loadData($userAccount);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userAccount/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户资金账户模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAccountUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAccountUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAccountBundleService = new UserAccountBundleService();
            $userAccount = $userAccountBundleService->getById($request['id']);
            if (empty($userAccount)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userAccountEntity = new UserAccountEntity();
            $userAccountEntity->loadData($request);

            $userAccountBundleService->update($userAccountEntity->toArray(), [
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

    #[OA\Delete(path: '/userAccount/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户资金账户模块'])]
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

            $userAccountBundleService = new UserAccountBundleService();
            if ($userAccountBundleService->remove($condition)) {
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
