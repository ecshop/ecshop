<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserAffiliateEntity;
use app\bundles\user\service\UserAffiliateBundleService;
use app\modules\admin\request\userAffiliate\UserAffiliateCreateRequest;
use app\modules\admin\request\userAffiliate\UserAffiliateQueryRequest;
use app\modules\admin\request\userAffiliate\UserAffiliateUpdateRequest;
use app\modules\admin\response\userAffiliate\UserAffiliateQueryResponse;
use app\modules\admin\response\userAffiliate\UserAffiliateResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserAffiliateController extends BaseController
{
    #[OA\Post(path: '/userAffiliate/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['分销日志模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAffiliateQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAffiliateQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserAffiliateQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userAffiliateBundleService = new UserAffiliateBundleService();
            $result = $userAffiliateBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserAffiliateResponse();
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

    #[OA\Post(path: '/userAffiliate/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['分销日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAffiliateCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAffiliateCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAffiliateEntity = new UserAffiliateEntity();
            $userAffiliateEntity->loadData($request);

            $userAffiliateBundleService = new UserAffiliateBundleService();
            $insertId = $userAffiliateBundleService->save($userAffiliateEntity->toArray());
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

    #[OA\Get(path: '/userAffiliate/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['分销日志模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAffiliateResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userAffiliateBundleService = new UserAffiliateBundleService();
            $userAffiliate = $userAffiliateBundleService->getOne($condition);

            if (empty($userAffiliate)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserAffiliateResponse();
            $response->loadData($userAffiliate);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userAffiliate/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['分销日志模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAffiliateUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAffiliateUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAffiliateBundleService = new UserAffiliateBundleService();
            $userAffiliate = $userAffiliateBundleService->getById($request['id']);
            if (empty($userAffiliate)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userAffiliateEntity = new UserAffiliateEntity();
            $userAffiliateEntity->loadData($request);

            $userAffiliateBundleService->update($userAffiliateEntity->toArray(), [
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

    #[OA\Delete(path: '/userAffiliate/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['分销日志模块'])]
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

            $userAffiliateBundleService = new UserAffiliateBundleService();
            if ($userAffiliateBundleService->remove($condition)) {
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
