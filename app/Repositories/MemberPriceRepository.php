<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\MemberPriceEntity;
use App\Models\MemberPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class MemberPriceRepository extends CurdRepository implements RepositoryInterface
{
    private static ?MemberPriceRepository $instance = null;

    /**
     * 单例 MemberPriceRepository
     */
    public static function getInstance(): MemberPriceRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new MemberPriceRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 MemberPriceEntity
     */
    public function saveEntity(MemberPriceEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?MemberPriceEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new MemberPriceEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?MemberPriceEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new MemberPriceEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('member_price');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new MemberPrice;
    }
}
