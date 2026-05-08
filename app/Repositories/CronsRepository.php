<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\CronsEntity;
use App\Models\Crons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class CronsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CronsRepository $instance = null;

    /**
     * 单例 CronsRepository
     */
    public static function getInstance(): CronsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CronsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 CronsEntity
     */
    public function saveEntity(CronsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CronsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new CronsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CronsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new CronsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('crons');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Crons;
    }
}
