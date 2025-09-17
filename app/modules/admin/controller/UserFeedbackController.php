<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\user\entity\UserFeedbackEntity;
use app\bundles\user\service\UserFeedbackBundleService;
use app\modules\admin\request\userFeedback\UserFeedbackCreateRequest;
use app\modules\admin\request\userFeedback\UserFeedbackQueryRequest;
use app\modules\admin\request\userFeedback\UserFeedbackUpdateRequest;
use app\modules\admin\response\userFeedback\UserFeedbackQueryResponse;
use app\modules\admin\response\userFeedback\UserFeedbackResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class UserFeedbackController extends BaseController
{
    #[OA\Post(path: '/userFeedback/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserFeedbackQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserFeedbackQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new UserFeedbackQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $userFeedbackBundleService = new UserFeedbackBundleService();
            $result = $userFeedbackBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new UserFeedbackResponse();
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

    #[OA\Post(path: '/userFeedback/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserFeedbackCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserFeedbackCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userFeedbackEntity = new UserFeedbackEntity();
            $userFeedbackEntity->loadData($request);

            $userFeedbackBundleService = new UserFeedbackBundleService();
            $insertId = $userFeedbackBundleService->save($userFeedbackEntity->toArray());
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

    #[OA\Get(path: '/userFeedback/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserFeedbackResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $userFeedbackBundleService = new UserFeedbackBundleService();
            $userFeedback = $userFeedbackBundleService->getOne($condition);

            if (empty($userFeedback)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new UserFeedbackResponse();
            $response->loadData($userFeedback);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/userFeedback/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserFeedbackUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new UserFeedbackUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $userFeedbackBundleService = new UserFeedbackBundleService();
            $userFeedback = $userFeedbackBundleService->getById($request['id']);
            if (empty($userFeedback)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $userFeedbackEntity = new UserFeedbackEntity();
            $userFeedbackEntity->loadData($request);

            $userFeedbackBundleService->update($userFeedbackEntity->toArray(), [
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

    #[OA\Delete(path: '/userFeedback/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['用户反馈模块'])]
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

            $userFeedbackBundleService = new UserFeedbackBundleService();
            if ($userFeedbackBundleService->remove($condition)) {
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
