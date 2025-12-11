<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\PayLogEntity;
use App\Models\PayLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class PayLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PayLogRepository $instance = null;

    /**
     * 单例 PayLogRepository
     */
    public static function getInstance(): PayLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PayLogRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 PayLogEntity
     */
    public function saveEntity(PayLogEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PayLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new PayLogEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PayLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new PayLogEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('pay_log');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new PayLog;
    }
}
