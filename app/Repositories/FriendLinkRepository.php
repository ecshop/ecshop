<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\FriendLinkEntity;
use App\Models\FriendLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class FriendLinkRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FriendLinkRepository $instance = null;

    /**
     * 单例 FriendLinkRepository
     */
    public static function getInstance(): FriendLinkRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FriendLinkRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 FriendLinkEntity
     */
    public function saveEntity(FriendLinkEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?FriendLinkEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new FriendLinkEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?FriendLinkEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new FriendLinkEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('friend_link');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new FriendLink;
    }
}
