<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\MailTemplatesEntity;
use App\Models\MailTemplates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class MailTemplatesRepository extends CurdRepository implements RepositoryInterface
{
    private static ?MailTemplatesRepository $instance = null;

    /**
     * 单例 MailTemplatesRepository
     */
    public static function getInstance(): MailTemplatesRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new MailTemplatesRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 MailTemplatesEntity
     */
    public function saveEntity(MailTemplatesEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?MailTemplatesEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new MailTemplatesEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?MailTemplatesEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new MailTemplatesEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('mail_templates');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new MailTemplates;
    }
}
