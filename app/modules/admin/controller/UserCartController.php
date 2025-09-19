<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserCartEntity;
use app\bundles\user\service\UserCartBundleService;
use app\modules\admin\request\userCart\UserCartCreateRequest;
use app\modules\admin\request\userCart\UserCartQueryRequest;
use app\modules\admin\request\userCart\UserCartUpdateRequest;
use app\modules\admin\response\userCart\UserCartQueryResponse;
use app\modules\admin\response\userCart\UserCartResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserCartController extends BaseController
{
    #[OA\Post(path: '/userCart/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['购物车模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCartQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserCartQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserCartQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userCartBundleService = new UserCartBundleService;
            $result = $userCartBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserCartResponse;
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

    #[OA\Post(path: '/userCart/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['购物车模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCartCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserCartCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userCartEntity = new UserCartEntity;
            $userCartEntity->loadData($request);

            $userCartBundleService = new UserCartBundleService;
            $insertId = $userCartBundleService->save($userCartEntity->toArray());
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

    #[OA\Get(path: '/userCart/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['购物车模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserCartResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userCartBundleService = new UserCartBundleService;
            $userCart = $userCartBundleService->getOne($condition);

            if (empty($userCart)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserCartResponse;
            $response->loadData($userCart);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userCart/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['购物车模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCartUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserCartUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userCartBundleService = new UserCartBundleService;
            $userCart = $userCartBundleService->getById($request['id']);
            if (empty($userCart)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userCartEntity = new UserCartEntity;
            $userCartEntity->loadData($request);

            $userCartBundleService->update($userCartEntity->toArray(), [
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

    #[OA\Delete(path: '/userCart/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['购物车模块'])]
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

            $userCartBundleService = new UserCartBundleService;
            if ($userCartBundleService->remove($condition)) {
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
