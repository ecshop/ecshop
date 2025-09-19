<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use app\bundles\payment\entity\PaymentEntity;
use app\bundles\payment\service\PaymentBundleService;
use app\modules\admin\request\payment\PaymentCreateRequest;
use app\modules\admin\request\payment\PaymentQueryRequest;
use app\modules\admin\request\payment\PaymentUpdateRequest;
use app\modules\admin\response\payment\PaymentQueryResponse;
use app\modules\admin\response\payment\PaymentResponse;
use Juling\Foundation\Exception\CustomException;
use OpenApi\Attributes as OA;
use think\facade\Db as DB;
use think\facade\Log;
use think\Response;
use Throwable;

class PaymentController extends BaseController
{
    #[OA\Post(path: '/payment/query', summary: '查询列表接口', security: [['bearerAuth' => []]], tags: ['支付方式模块'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PaymentQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PaymentQueryResponse::class))]
    public function query(): Response
    {
        try {
            $request = $this->request->get();
            $page = intval($this->request->param('page', 1));
            $pageSize = intval($this->request->param('pageSize', 10));

            $v = new PaymentQueryRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $condition = [
                //
            ];

            $paymentBundleService = new PaymentBundleService;
            $result = $paymentBundleService->page($condition, $page, $pageSize);

            foreach ($result['data'] as $key => $item) {
                $response = new PaymentResponse;
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

    #[OA\Post(path: '/payment/create', summary: '新增接口', security: [['bearerAuth' => []]], tags: ['支付方式模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PaymentCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function create(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new PaymentCreateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $paymentEntity = new PaymentEntity;
            $paymentEntity->loadData($request);

            $paymentBundleService = new PaymentBundleService;
            $insertId = $paymentBundleService->save($paymentEntity->toArray());
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

    #[OA\Get(path: '/payment/show', summary: '获取详情接口', security: [['bearerAuth' => []]], tags: ['支付方式模块'])]
    #[OA\Parameter(name: 'id', description: 'ID', in: 'query', required: true, example: 1)]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: PaymentResponse::class))]
    public function show(): Response
    {
        try {
            $id = intval($this->request->param('id', 0));

            $condition = [
                ['id', '=', $id],
            ];

            $paymentBundleService = new PaymentBundleService;
            $payment = $paymentBundleService->getOne($condition);

            if (empty($payment)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $response = new PaymentResponse;
            $response->loadData($payment);

            return $this->success($response->toArray());
        } catch (Throwable $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e);

            return $this->error('获取详情错误');
        }
    }

    #[OA\Put(path: '/payment/update', summary: '更新接口', security: [['bearerAuth' => []]], tags: ['支付方式模块'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: PaymentUpdateRequest::class))]
    #[OA\Response(response: 200, description: 'OK')]
    public function update(): Response
    {
        DB::startTrans();
        try {
            $request = $this->request->get();

            $v = new PaymentUpdateRequest;
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            $paymentBundleService = new PaymentBundleService;
            $payment = $paymentBundleService->getById($request['id']);
            if (empty($payment)) {
                throw new CustomException('数据不存在或状态异常');
            }

            $paymentEntity = new PaymentEntity;
            $paymentEntity->loadData($request);

            $paymentBundleService->update($paymentEntity->toArray(), [
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

    #[OA\Delete(path: '/payment/destroy', summary: '删除接口', security: [['bearerAuth' => []]], tags: ['支付方式模块'])]
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

            $paymentBundleService = new PaymentBundleService;
            if ($paymentBundleService->remove($condition)) {
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
