<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\CardEntity;
use App\Models\Card;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class CardRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CardRepository $instance = null;

    /**
     * 单例 CardRepository
     */
    public static function getInstance(): CardRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CardRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 CardEntity
     */
    public function saveEntity(CardEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CardEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new CardEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CardEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new CardEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('card');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Card;
    }
}
