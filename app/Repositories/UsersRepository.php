<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\UsersEntity;
use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class UsersRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UsersRepository $instance = null;

    /**
     * 单例 UsersRepository
     */
    public static function getInstance(): UsersRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UsersRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 UsersEntity
     */
    public function saveEntity(UsersEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?UsersEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new UsersEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?UsersEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new UsersEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('users');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Users;
    }
}
