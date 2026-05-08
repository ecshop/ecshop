<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\RegExtendInfoEntity;
use App\Models\RegExtendInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class RegExtendInfoRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegExtendInfoRepository $instance = null;

    /**
     * 单例 RegExtendInfoRepository
     */
    public static function getInstance(): RegExtendInfoRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegExtendInfoRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 RegExtendInfoEntity
     */
    public function saveEntity(RegExtendInfoEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?RegExtendInfoEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new RegExtendInfoEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?RegExtendInfoEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new RegExtendInfoEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('reg_extend_info');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new RegExtendInfo;
    }
}
