<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\AdsenseEntity;
use App\Models\Adsense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class AdsenseRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdsenseRepository $instance = null;

    /**
     * 单例 AdsenseRepository
     */
    public static function getInstance(): AdsenseRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdsenseRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 AdsenseEntity
     */
    public function saveEntity(AdsenseEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdsenseEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new AdsenseEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdsenseEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new AdsenseEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('adsense');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Adsense;
    }
}
