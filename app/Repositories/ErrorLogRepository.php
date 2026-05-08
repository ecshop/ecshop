<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\ErrorLogEntity;
use App\Models\ErrorLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class ErrorLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ErrorLogRepository $instance = null;

    /**
     * 单例 ErrorLogRepository
     */
    public static function getInstance(): ErrorLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ErrorLogRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 ErrorLogEntity
     */
    public function saveEntity(ErrorLogEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ErrorLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new ErrorLogEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ErrorLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new ErrorLogEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('error_log');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new ErrorLog;
    }
}
