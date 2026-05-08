<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\EmailListEntity;
use App\Models\EmailList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class EmailListRepository extends CurdRepository implements RepositoryInterface
{
    private static ?EmailListRepository $instance = null;

    /**
     * 单例 EmailListRepository
     */
    public static function getInstance(): EmailListRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new EmailListRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 EmailListEntity
     */
    public function saveEntity(EmailListEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?EmailListEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new EmailListEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?EmailListEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new EmailListEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('email_list');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new EmailList;
    }
}
