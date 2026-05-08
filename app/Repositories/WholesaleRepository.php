<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\WholesaleEntity;
use App\Models\Wholesale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class WholesaleRepository extends CurdRepository implements RepositoryInterface
{
    private static ?WholesaleRepository $instance = null;

    /**
     * 单例 WholesaleRepository
     */
    public static function getInstance(): WholesaleRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new WholesaleRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 WholesaleEntity
     */
    public function saveEntity(WholesaleEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?WholesaleEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new WholesaleEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?WholesaleEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new WholesaleEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('wholesale');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Wholesale;
    }
}
