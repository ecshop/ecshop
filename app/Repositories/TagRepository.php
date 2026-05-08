<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\TagEntity;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class TagRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TagRepository $instance = null;

    /**
     * 单例 TagRepository
     */
    public static function getInstance(): TagRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TagRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 TagEntity
     */
    public function saveEntity(TagEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?TagEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new TagEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?TagEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new TagEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('tag');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Tag;
    }
}
