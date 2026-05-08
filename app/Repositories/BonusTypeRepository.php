<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\BonusTypeEntity;
use App\Models\BonusType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class BonusTypeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BonusTypeRepository $instance = null;

    /**
     * 单例 BonusTypeRepository
     */
    public static function getInstance(): BonusTypeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BonusTypeRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 BonusTypeEntity
     */
    public function saveEntity(BonusTypeEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BonusTypeEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new BonusTypeEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BonusTypeEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new BonusTypeEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('bonus_type');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new BonusType;
    }
}
