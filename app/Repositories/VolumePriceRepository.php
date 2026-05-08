<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\VolumePriceEntity;
use App\Models\VolumePrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class VolumePriceRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VolumePriceRepository $instance = null;

    /**
     * 单例 VolumePriceRepository
     */
    public static function getInstance(): VolumePriceRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VolumePriceRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 VolumePriceEntity
     */
    public function saveEntity(VolumePriceEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VolumePriceEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new VolumePriceEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VolumePriceEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new VolumePriceEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('volume_price');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new VolumePrice;
    }
}
