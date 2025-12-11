<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\PluginsEntity;
use App\Models\Plugins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class PluginsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PluginsRepository $instance = null;

    /**
     * 单例 PluginsRepository
     */
    public static function getInstance(): PluginsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PluginsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 PluginsEntity
     */
    public function saveEntity(PluginsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PluginsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new PluginsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PluginsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new PluginsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('plugins');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Plugins;
    }
}
