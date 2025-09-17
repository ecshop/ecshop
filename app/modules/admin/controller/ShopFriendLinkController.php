<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\shop\entity\ShopFriendLinkEntity;
use app\bundles\shop\service\ShopFriendLinkBundleService;
use app\modules\admin\request\shopFriendLink\ShopFriendLinkCreateRequest;
use app\modules\admin\request\shopFriendLink\ShopFriendLinkQueryRequest;
use app\modules\admin\request\shopFriendLink\ShopFriendLinkUpdateRequest;
use app\modules\admin\response\shopFriendLink\ShopFriendLinkQueryResponse;
use app\modules\admin\response\shopFriendLink\ShopFriendLinkResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class ShopFriendLinkController extends BaseController
{
    #[OA\Post(path: '/shopFriendLink/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['友情链接模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopFriendLinkQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopFriendLinkQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new ShopFriendLinkQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $shopFriendLinkBundleService = new ShopFriendLinkBundleService();
            $result = $shopFriendLinkBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new ShopFriendLinkResponse();
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

    #[OA\Post(path: '/shopFriendLink/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['友情链接模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopFriendLinkCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopFriendLinkCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopFriendLinkEntity = new ShopFriendLinkEntity();
            $shopFriendLinkEntity->loadData($request);

            $shopFriendLinkBundleService = new ShopFriendLinkBundleService();
            $insertId = $shopFriendLinkBundleService->save($shopFriendLinkEntity->toArray());
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

    #[OA\Get(path: '/shopFriendLink/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['友情链接模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: ShopFriendLinkResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $shopFriendLinkBundleService = new ShopFriendLinkBundleService();
            $shopFriendLink = $shopFriendLinkBundleService->getOne($condition);

            if (empty($shopFriendLink)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new ShopFriendLinkResponse();
            $response->loadData($shopFriendLink);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/shopFriendLink/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['友情链接模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: ShopFriendLinkUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new ShopFriendLinkUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $shopFriendLinkBundleService = new ShopFriendLinkBundleService();
            $shopFriendLink = $shopFriendLinkBundleService->getById($request['id']);
            if (empty($shopFriendLink)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $shopFriendLinkEntity = new ShopFriendLinkEntity();
            $shopFriendLinkEntity->loadData($request);

            $shopFriendLinkBundleService->update($shopFriendLinkEntity->toArray(), [
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

    #[OA\Delete(path: '/shopFriendLink/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['友情链接模块'])]
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

            $shopFriendLinkBundleService = new ShopFriendLinkBundleService();
            if ($shopFriendLinkBundleService->remove($condition)) {
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
