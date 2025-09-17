<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserBonusEntity;
use app\bundles\user\service\UserBonusBundleService;
use app\modules\admin\request\userBonus\UserBonusCreateRequest;
use app\modules\admin\request\userBonus\UserBonusQueryRequest;
use app\modules\admin\request\userBonus\UserBonusUpdateRequest;
use app\modules\admin\response\userBonus\UserBonusQueryResponse;
use app\modules\admin\response\userBonus\UserBonusResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserBonusController extends BaseController
{
    #[OA\Post(path: '/userBonus/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户优惠券模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserBonusQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserBonusQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserBonusQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userBonusBundleService = new UserBonusBundleService();
            $result = $userBonusBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserBonusResponse();
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

    #[OA\Post(path: '/userBonus/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户优惠券模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserBonusCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserBonusCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userBonusEntity = new UserBonusEntity();
            $userBonusEntity->loadData($request);

            $userBonusBundleService = new UserBonusBundleService();
            $insertId = $userBonusBundleService->save($userBonusEntity->toArray());
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

    #[OA\Get(path: '/userBonus/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户优惠券模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserBonusResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userBonusBundleService = new UserBonusBundleService();
            $userBonus = $userBonusBundleService->getOne($condition);

            if (empty($userBonus)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserBonusResponse();
            $response->loadData($userBonus);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userBonus/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户优惠券模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserBonusUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserBonusUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userBonusBundleService = new UserBonusBundleService();
            $userBonus = $userBonusBundleService->getById($request['id']);
            if (empty($userBonus)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userBonusEntity = new UserBonusEntity();
            $userBonusEntity->loadData($request);

            $userBonusBundleService->update($userBonusEntity->toArray(), [
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

    #[OA\Delete(path: '/userBonus/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户优惠券模块'])]
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

            $userBonusBundleService = new UserBonusBundleService();
            if ($userBonusBundleService->remove($condition)) {
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
