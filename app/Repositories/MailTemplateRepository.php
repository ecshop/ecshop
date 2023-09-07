<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\MailTemplateModel;
use App\Models\Entity\MailTemplate;
use App\Repositories\CurdRepository;

class MailTemplateRepository extends CurdRepository implements RepositoryInterface
{
    private static ?MailTemplateRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): MailTemplateRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new MailTemplateRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveMailTemplate(MailTemplate $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnMailTemplate(int $id): ?MailTemplate
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new MailTemplate();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnMailTemplate(array $condition): ?MailTemplate
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new MailTemplate();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnMailTemplate(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new MailTemplate();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnMailTemplate(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new MailTemplate();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): MailTemplateModel
    {
        return new MailTemplateModel();
    }
}
