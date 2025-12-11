<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\CategoryEntity;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class CategoryRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CategoryRepository $instance = null;

    /**
     * 单例 CategoryRepository
     */
    public static function getInstance(): CategoryRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CategoryRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 CategoryEntity
     */
    public function saveEntity(CategoryEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CategoryEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new CategoryEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CategoryEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new CategoryEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('category');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Category;
    }
}
