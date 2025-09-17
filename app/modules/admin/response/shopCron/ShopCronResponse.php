<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopCron;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopCronResponse')]
class ShopCronResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '任务ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cronCode', description: '任务代码', type: 'string')]
    private string $cronCode;

    #[OA\Property(property: 'cronName', description: '任务名称', type: 'string')]
    private string $cronName;

    #[OA\Property(property: 'cronDesc', description: '任务描述', type: 'string')]
    private string $cronDesc;

    #[OA\Property(property: 'cronOrder', description: '排序', type: 'integer')]
    private int $cronOrder;

    #[OA\Property(property: 'cronConfig', description: '任务配置', type: 'string')]
    private string $cronConfig;

    #[OA\Property(property: 'thistime', description: '上次执行时间', type: 'integer')]
    private int $thistime;

    #[OA\Property(property: 'nextime', description: '下次执行时间', type: 'integer')]
    private int $nextime;

    #[OA\Property(property: 'day', description: '执行日(每月)', type: 'integer')]
    private int $day;

    #[OA\Property(property: 'week', description: '执行周(每周)', type: 'string')]
    private string $week;

    #[OA\Property(property: 'hour', description: '执行小时', type: 'string')]
    private string $hour;

    #[OA\Property(property: 'minute', description: '执行分钟', type: 'string')]
    private string $minute;

    #[OA\Property(property: 'enable', description: '是否启用', type: 'integer')]
    private int $enable;

    #[OA\Property(property: 'runOnce', description: '是否只运行一次', type: 'integer')]
    private int $runOnce;

    #[OA\Property(property: 'allowIp', description: '允许执行的IP', type: 'string')]
    private string $allowIp;

    #[OA\Property(property: 'alowFiles', description: '允许执行的文件', type: 'string')]
    private string $alowFiles;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCronCode(): string
    {
        return $this->cronCode;
    }

    public function setCronCode(string $cronCode): void
    {
        $this->cronCode = $cronCode;
    }

    public function getCronName(): string
    {
        return $this->cronName;
    }

    public function setCronName(string $cronName): void
    {
        $this->cronName = $cronName;
    }

    public function getCronDesc(): string
    {
        return $this->cronDesc;
    }

    public function setCronDesc(string $cronDesc): void
    {
        $this->cronDesc = $cronDesc;
    }

    public function getCronOrder(): int
    {
        return $this->cronOrder;
    }

    public function setCronOrder(int $cronOrder): void
    {
        $this->cronOrder = $cronOrder;
    }

    public function getCronConfig(): string
    {
        return $this->cronConfig;
    }

    public function setCronConfig(string $cronConfig): void
    {
        $this->cronConfig = $cronConfig;
    }

    public function getThistime(): int
    {
        return $this->thistime;
    }

    public function setThistime(int $thistime): void
    {
        $this->thistime = $thistime;
    }

    public function getNextime(): int
    {
        return $this->nextime;
    }

    public function setNextime(int $nextime): void
    {
        $this->nextime = $nextime;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function getWeek(): string
    {
        return $this->week;
    }

    public function setWeek(string $week): void
    {
        $this->week = $week;
    }

    public function getHour(): string
    {
        return $this->hour;
    }

    public function setHour(string $hour): void
    {
        $this->hour = $hour;
    }

    public function getMinute(): string
    {
        return $this->minute;
    }

    public function setMinute(string $minute): void
    {
        $this->minute = $minute;
    }

    public function getEnable(): int
    {
        return $this->enable;
    }

    public function setEnable(int $enable): void
    {
        $this->enable = $enable;
    }

    public function getRunOnce(): int
    {
        return $this->runOnce;
    }

    public function setRunOnce(int $runOnce): void
    {
        $this->runOnce = $runOnce;
    }

    public function getAllowIp(): string
    {
        return $this->allowIp;
    }

    public function setAllowIp(string $allowIp): void
    {
        $this->allowIp = $allowIp;
    }

    public function getAlowFiles(): string
    {
        return $this->alowFiles;
    }

    public function setAlowFiles(string $alowFiles): void
    {
        $this->alowFiles = $alowFiles;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
