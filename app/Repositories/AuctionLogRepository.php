<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\AuctionLogEntity;
use App\Models\AuctionLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class AuctionLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AuctionLogRepository $instance = null;

    /**
     * 单例 AuctionLogRepository
     */
    public static function getInstance(): AuctionLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AuctionLogRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 AuctionLogEntity
     */
    public function saveEntity(AuctionLogEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AuctionLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new AuctionLogEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AuctionLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new AuctionLogEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('auction_log');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new AuctionLog;
    }
}
