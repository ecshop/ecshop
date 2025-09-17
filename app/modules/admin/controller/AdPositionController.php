<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\ad\entity\AdPositionEntity;
use app\bundles\ad\service\AdPositionBundleService;
use app\modules\admin\request\adPosition\AdPositionCreateRequest;
use app\modules\admin\request\adPosition\AdPositionQueryRequest;
use app\modules\admin\request\adPosition\AdPositionUpdateRequest;
use app\modules\admin\response\adPosition\AdPositionQueryResponse;
use app\modules\admin\response\adPosition\AdPositionResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class AdPositionController extends BaseController
{
    #[OA\Post(path: '/adPosition/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['广告位模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdPositionQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdPositionQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new AdPositionQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $adPositionBundleService = new AdPositionBundleService();
            $result = $adPositionBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new AdPositionResponse();
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

    #[OA\Post(path: '/adPosition/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['广告位模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdPositionCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdPositionCreateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adPositionEntity = new AdPositionEntity();
            $adPositionEntity->loadData($request);

            $adPositionBundleService = new AdPositionBundleService();
            $insertId = $adPositionBundleService->save($adPositionEntity->toArray());
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

    #[OA\Get(path: '/adPosition/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['广告位模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: AdPositionResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $adPositionBundleService = new AdPositionBundleService();
            $adPosition = $adPositionBundleService->getOne($condition);

            if (empty($adPosition)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new AdPositionResponse();
            $response->loadData($adPosition);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/adPosition/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['广告位模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: AdPositionUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new AdPositionUpdateRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $adPositionBundleService = new AdPositionBundleService();
            $adPosition = $adPositionBundleService->getById($request['id']);
            if (empty($adPosition)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $adPositionEntity = new AdPositionEntity();
            $adPositionEntity->loadData($request);

            $adPositionBundleService->update($adPositionEntity->toArray(), [
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

    #[OA\Delete(path: '/adPosition/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['广告位模块'])]
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

            $adPositionBundleService = new AdPositionBundleService();
            if ($adPositionBundleService->remove($condition)) {
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
