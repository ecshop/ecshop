<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserBookingEntity;
use app\bundles\user\service\UserBookingBundleService;
use app\modules\admin\request\userBooking\UserBookingCreateRequest;
use app\modules\admin\request\userBooking\UserBookingQueryRequest;
use app\modules\admin\request\userBooking\UserBookingUpdateRequest;
use app\modules\admin\response\userBooking\UserBookingQueryResponse;
use app\modules\admin\response\userBooking\UserBookingResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserBookingController extends BaseController
{
    #[OA\Post(path: '/userBooking/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品预订模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserBookingQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserBookingQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserBookingQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userBookingBundleService = new UserBookingBundleService();
            $result = $userBookingBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserBookingResponse();
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

    #[OA\Post(path: '/userBooking/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品预订模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserBookingCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserBookingCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userBookingEntity = new UserBookingEntity();
            $userBookingEntity->loadData($request);

            $userBookingBundleService = new UserBookingBundleService();
            $insertId = $userBookingBundleService->save($userBookingEntity->toArray());
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

    #[OA\Get(path: '/userBooking/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品预订模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserBookingResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userBookingBundleService = new UserBookingBundleService();
            $userBooking = $userBookingBundleService->getOne($condition);

            if (empty($userBooking)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserBookingResponse();
            $response->loadData($userBooking);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userBooking/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品预订模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserBookingUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserBookingUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userBookingBundleService = new UserBookingBundleService();
            $userBooking = $userBookingBundleService->getById($request['id']);
            if (empty($userBooking)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userBookingEntity = new UserBookingEntity();
            $userBookingEntity->loadData($request);

            $userBookingBundleService->update($userBookingEntity->toArray(), [
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

    #[OA\Delete(path: '/userBooking/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品预订模块'])]
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

            $userBookingBundleService = new UserBookingBundleService();
            if ($userBookingBundleService->remove($condition)) {
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
