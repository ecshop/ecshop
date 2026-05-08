<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\AutoManageEntity;
use App\Models\AutoManage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class AutoManageRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AutoManageRepository $instance = null;

    /**
     * 单例 AutoManageRepository
     */
    public static function getInstance(): AutoManageRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AutoManageRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 AutoManageEntity
     */
    public function saveEntity(AutoManageEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AutoManageEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new AutoManageEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AutoManageEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new AutoManageEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('auto_manage');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new AutoManage;
    }
}
