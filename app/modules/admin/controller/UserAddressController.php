<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserAddressEntity;
use app\bundles\user\service\UserAddressBundleService;
use app\modules\admin\request\userAddress\UserAddressCreateRequest;
use app\modules\admin\request\userAddress\UserAddressQueryRequest;
use app\modules\admin\request\userAddress\UserAddressUpdateRequest;
use app\modules\admin\response\userAddress\UserAddressQueryResponse;
use app\modules\admin\response\userAddress\UserAddressResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserAddressController extends BaseController
{
    #[OA\Post(path: '/userAddress/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户地址模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAddressQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAddressQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserAddressQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userAddressBundleService = new UserAddressBundleService();
            $result = $userAddressBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserAddressResponse();
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

    #[OA\Post(path: '/userAddress/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户地址模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAddressCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAddressCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAddressEntity = new UserAddressEntity();
            $userAddressEntity->loadData($request);

            $userAddressBundleService = new UserAddressBundleService();
            $insertId = $userAddressBundleService->save($userAddressEntity->toArray());
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

    #[OA\Get(path: '/userAddress/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户地址模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserAddressResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userAddressBundleService = new UserAddressBundleService();
            $userAddress = $userAddressBundleService->getOne($condition);

            if (empty($userAddress)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserAddressResponse();
            $response->loadData($userAddress);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userAddress/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户地址模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserAddressUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserAddressUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userAddressBundleService = new UserAddressBundleService();
            $userAddress = $userAddressBundleService->getById($request['id']);
            if (empty($userAddress)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userAddressEntity = new UserAddressEntity();
            $userAddressEntity->loadData($request);

            $userAddressBundleService->update($userAddressEntity->toArray(), [
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

    #[OA\Delete(path: '/userAddress/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户地址模块'])]
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

            $userAddressBundleService = new UserAddressBundleService();
            if ($userAddressBundleService->remove($condition)) {
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
