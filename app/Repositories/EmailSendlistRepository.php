<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\EmailSendlistEntity;
use App\Models\EmailSendlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class EmailSendlistRepository extends CurdRepository implements RepositoryInterface
{
    private static ?EmailSendlistRepository $instance = null;

    /**
     * 单例 EmailSendlistRepository
     */
    public static function getInstance(): EmailSendlistRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new EmailSendlistRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 EmailSendlistEntity
     */
    public function saveEntity(EmailSendlistEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?EmailSendlistEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new EmailSendlistEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?EmailSendlistEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new EmailSendlistEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('email_sendlist');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new EmailSendlist;
    }
}
