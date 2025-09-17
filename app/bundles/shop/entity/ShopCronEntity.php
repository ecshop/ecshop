<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopCronEntity')]
class ShopCronEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '任务ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cron_code', description: '任务代码', type: 'string')]
    private string $cron_code;

    #[OA\Property(property: 'cron_name', description: '任务名称', type: 'string')]
    private string $cron_name;

    #[OA\Property(property: 'cron_desc', description: '任务描述', type: 'string')]
    private string $cron_desc;

    #[OA\Property(property: 'cron_order', description: '排序', type: 'integer')]
    private int $cron_order;

    #[OA\Property(property: 'cron_config', description: '任务配置', type: 'string')]
    private string $cron_config;

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

    #[OA\Property(property: 'run_once', description: '是否只运行一次', type: 'integer')]
    private int $run_once;

    #[OA\Property(property: 'allow_ip', description: '允许执行的IP', type: 'string')]
    private string $allow_ip;

    #[OA\Property(property: 'alow_files', description: '允许执行的文件', type: 'string')]
    private string $alow_files;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->cron_code;
    }

    public function setCronCode(string $cronCode): void
    {
        $this->cron_code = $cronCode;
    }

    public function getCronName(): string
    {
        return $this->cron_name;
    }

    public function setCronName(string $cronName): void
    {
        $this->cron_name = $cronName;
    }

    public function getCronDesc(): string
    {
        return $this->cron_desc;
    }

    public function setCronDesc(string $cronDesc): void
    {
        $this->cron_desc = $cronDesc;
    }

    public function getCronOrder(): int
    {
        return $this->cron_order;
    }

    public function setCronOrder(int $cronOrder): void
    {
        $this->cron_order = $cronOrder;
    }

    public function getCronConfig(): string
    {
        return $this->cron_config;
    }

    public function setCronConfig(string $cronConfig): void
    {
        $this->cron_config = $cronConfig;
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
        return $this->run_once;
    }

    public function setRunOnce(int $runOnce): void
    {
        $this->run_once = $runOnce;
    }

    public function getAllowIp(): string
    {
        return $this->allow_ip;
    }

    public function setAllowIp(string $allowIp): void
    {
        $this->allow_ip = $allowIp;
    }

    public function getAlowFiles(): string
    {
        return $this->alow_files;
    }

    public function setAlowFiles(string $alowFiles): void
    {
        $this->alow_files = $alowFiles;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}
