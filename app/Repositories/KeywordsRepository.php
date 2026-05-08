<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\KeywordsEntity;
use App\Models\Keywords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class KeywordsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?KeywordsRepository $instance = null;

    /**
     * 单例 KeywordsRepository
     */
    public static function getInstance(): KeywordsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new KeywordsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 KeywordsEntity
     */
    public function saveEntity(KeywordsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?KeywordsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new KeywordsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?KeywordsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new KeywordsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('keywords');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Keywords;
    }
}
