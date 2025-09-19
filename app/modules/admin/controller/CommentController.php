<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\comment\entity\CommentEntity;
use app\bundles\comment\service\CommentBundleService;
use app\modules\admin\request\comment\CommentCreateRequest;
use app\modules\admin\request\comment\CommentQueryRequest;
use app\modules\admin\request\comment\CommentUpdateRequest;
use app\modules\admin\response\comment\CommentQueryResponse;
use app\modules\admin\response\comment\CommentResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class CommentController extends BaseController
{
    #[OA\Post(path: '/comment/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['商品评论模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CommentQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CommentQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new CommentQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $commentBundleService = new CommentBundleService;
            $result = $commentBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new CommentResponse;
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

    #[OA\Post(path: '/comment/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['商品评论模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CommentCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new CommentCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $commentEntity = new CommentEntity;
            $commentEntity->loadData($request);

            $commentBundleService = new CommentBundleService;
            $insertId = $commentBundleService->save($commentEntity->toArray());
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

    #[OA\Get(path: '/comment/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['商品评论模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CommentResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $commentBundleService = new CommentBundleService;
            $comment = $commentBundleService->getOne($condition);

            if (empty($comment)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new CommentResponse;
            $response->loadData($comment);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/comment/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['商品评论模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: CommentUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new CommentUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $commentBundleService = new CommentBundleService;
            $comment = $commentBundleService->getById($request['id']);
            if (empty($comment)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $commentEntity = new CommentEntity;
            $commentEntity->loadData($request);

            $commentBundleService->update($commentEntity->toArray(), [
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

    #[OA\Delete(path: '/comment/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['商品评论模块'])]
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

            $commentBundleService = new CommentBundleService;
            if ($commentBundleService->remove($condition)) {
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
