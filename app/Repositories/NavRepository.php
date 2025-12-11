<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\NavEntity;
use App\Models\Nav;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class NavRepository extends CurdRepository implements RepositoryInterface
{
    private static ?NavRepository $instance = null;

    /**
     * 单例 NavRepository
     */
    public static function getInstance(): NavRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new NavRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 NavEntity
     */
    public function saveEntity(NavEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?NavEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new NavEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?NavEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new NavEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('nav');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Nav;
    }
}
