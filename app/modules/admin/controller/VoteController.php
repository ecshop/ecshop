<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\vote\entity\VoteEntity;
use app\bundles\vote\service\VoteBundleService;
use app\modules\admin\request\vote\VoteCreateRequest;
use app\modules\admin\request\vote\VoteQueryRequest;
use app\modules\admin\request\vote\VoteUpdateRequest;
use app\modules\admin\response\vote\VoteQueryResponse;
use app\modules\admin\response\vote\VoteResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class VoteController extends BaseController
{
    #[OA\Post(path: '/vote/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['投票模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new VoteQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $voteBundleService = new VoteBundleService;
            $result = $voteBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new VoteResponse;
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

    #[OA\Post(path: '/vote/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['投票模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new VoteCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $voteEntity = new VoteEntity;
            $voteEntity->loadData($request);

            $voteBundleService = new VoteBundleService;
            $insertId = $voteBundleService->save($voteEntity->toArray());
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

    #[OA\Get(path: '/vote/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['投票模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: VoteResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $voteBundleService = new VoteBundleService;
            $vote = $voteBundleService->getOne($condition);

            if (empty($vote)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new VoteResponse;
            $response->loadData($vote);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/vote/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['投票模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: VoteUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new VoteUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $voteBundleService = new VoteBundleService;
            $vote = $voteBundleService->getById($request['id']);
            if (empty($vote)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $voteEntity = new VoteEntity;
            $voteEntity->loadData($request);

            $voteBundleService->update($voteEntity->toArray(), [
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

    #[OA\Delete(path: '/vote/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['投票模块'])]
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

            $voteBundleService = new VoteBundleService;
            if ($voteBundleService->remove($condition)) {
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
