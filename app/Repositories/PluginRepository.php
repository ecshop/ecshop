<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\PluginModel;
use App\Models\Entity\Plugin;
use App\Repositories\CurdRepository;

class PluginRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PluginRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PluginRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PluginRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function savePlugin(Plugin $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnPlugin(int $id): ?Plugin
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Plugin();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnPlugin(array $condition): ?Plugin
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Plugin();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnPlugin(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Plugin();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnPlugin(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Plugin();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): PluginModel
    {
        return new PluginModel();
    }
}
