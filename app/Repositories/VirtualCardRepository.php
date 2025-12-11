<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\VirtualCardEntity;
use App\Models\VirtualCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class VirtualCardRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VirtualCardRepository $instance = null;

    /**
     * 单例 VirtualCardRepository
     */
    public static function getInstance(): VirtualCardRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VirtualCardRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 VirtualCardEntity
     */
    public function saveEntity(VirtualCardEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VirtualCardEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new VirtualCardEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VirtualCardEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new VirtualCardEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('virtual_card');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new VirtualCard;
    }
}
