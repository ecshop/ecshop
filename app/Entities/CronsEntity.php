<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CronsEntity')]
class CronsEntity
{
    use DTOHelper;

    const string getCronId = 'cron_id';

    const string getCronCode = 'cron_code';

    const string getCronName = 'cron_name';

    const string getCronDesc = 'cron_desc';

    const string getCronOrder = 'cron_order';

    const string getCronConfig = 'cron_config';

    const string getThistime = 'thistime';

    const string getNextime = 'nextime';

    const string getDay = 'day';

    const string getWeek = 'week';

    const string getHour = 'hour';

    const string getMinute = 'minute';

    const string getEnable = 'enable';

    const string getRunOnce = 'run_once';

    const string getAllowIp = 'allow_ip';

    const string getAlowFiles = 'alow_files';

    #[OA\Property(property: 'cronId', description: '', type: 'integer')]
    private int $cronId;

    #[OA\Property(property: 'cronCode', description: '', type: 'string')]
    private string $cronCode;

    #[OA\Property(property: 'cronName', description: '', type: 'string')]
    private string $cronName;

    #[OA\Property(property: 'cronDesc', description: '', type: 'string')]
    private string $cronDesc;

    #[OA\Property(property: 'cronOrder', description: '', type: 'integer')]
    private int $cronOrder;

    #[OA\Property(property: 'cronConfig', description: '', type: 'string')]
    private string $cronConfig;

    #[OA\Property(property: 'thistime', description: '', type: 'integer')]
    private int $thistime;

    #[OA\Property(property: 'nextime', description: '', type: 'integer')]
    private int $nextime;

    #[OA\Property(property: 'day', description: '', type: 'integer')]
    private int $day;

    #[OA\Property(property: 'week', description: '', type: 'string')]
    private string $week;

    #[OA\Property(property: 'hour', description: '', type: 'string')]
    private string $hour;

    #[OA\Property(property: 'minute', description: '', type: 'string')]
    private string $minute;

    #[OA\Property(property: 'enable', description: '', type: 'integer')]
    private int $enable;

    #[OA\Property(property: 'runOnce', description: '', type: 'integer')]
    private int $runOnce;

    #[OA\Property(property: 'allowIp', description: '', type: 'string')]
    private string $allowIp;

    #[OA\Property(property: 'alowFiles', description: '', type: 'string')]
    private string $alowFiles;

    /**
     * 获取
     */
    public function getCronId(): int
    {
        return $this->cronId;
    }

    /**
     * 设置
     */
    public function setCronId(int $cronId): void
    {
        $this->cronId = $cronId;
    }

    /**
     * 获取
     */
    public function getCronCode(): string
    {
        return $this->cronCode;
    }

    /**
     * 设置
     */
    public function setCronCode(string $cronCode): void
    {
        $this->cronCode = $cronCode;
    }

    /**
     * 获取
     */
    public function getCronName(): string
    {
        return $this->cronName;
    }

    /**
     * 设置
     */
    public function setCronName(string $cronName): void
    {
        $this->cronName = $cronName;
    }

    /**
     * 获取
     */
    public function getCronDesc(): string
    {
        return $this->cronDesc;
    }

    /**
     * 设置
     */
    public function setCronDesc(string $cronDesc): void
    {
        $this->cronDesc = $cronDesc;
    }

    /**
     * 获取
     */
    public function getCronOrder(): int
    {
        return $this->cronOrder;
    }

    /**
     * 设置
     */
    public function setCronOrder(int $cronOrder): void
    {
        $this->cronOrder = $cronOrder;
    }

    /**
     * 获取
     */
    public function getCronConfig(): string
    {
        return $this->cronConfig;
    }

    /**
     * 设置
     */
    public function setCronConfig(string $cronConfig): void
    {
        $this->cronConfig = $cronConfig;
    }

    /**
     * 获取
     */
    public function getThistime(): int
    {
        return $this->thistime;
    }

    /**
     * 设置
     */
    public function setThistime(int $thistime): void
    {
        $this->thistime = $thistime;
    }

    /**
     * 获取
     */
    public function getNextime(): int
    {
        return $this->nextime;
    }

    /**
     * 设置
     */
    public function setNextime(int $nextime): void
    {
        $this->nextime = $nextime;
    }

    /**
     * 获取
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * 设置
     */
    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    /**
     * 获取
     */
    public function getWeek(): string
    {
        return $this->week;
    }

    /**
     * 设置
     */
    public function setWeek(string $week): void
    {
        $this->week = $week;
    }

    /**
     * 获取
     */
    public function getHour(): string
    {
        return $this->hour;
    }

    /**
     * 设置
     */
    public function setHour(string $hour): void
    {
        $this->hour = $hour;
    }

    /**
     * 获取
     */
    public function getMinute(): string
    {
        return $this->minute;
    }

    /**
     * 设置
     */
    public function setMinute(string $minute): void
    {
        $this->minute = $minute;
    }

    /**
     * 获取
     */
    public function getEnable(): int
    {
        return $this->enable;
    }

    /**
     * 设置
     */
    public function setEnable(int $enable): void
    {
        $this->enable = $enable;
    }

    /**
     * 获取
     */
    public function getRunOnce(): int
    {
        return $this->runOnce;
    }

    /**
     * 设置
     */
    public function setRunOnce(int $runOnce): void
    {
        $this->runOnce = $runOnce;
    }

    /**
     * 获取
     */
    public function getAllowIp(): string
    {
        return $this->allowIp;
    }

    /**
     * 设置
     */
    public function setAllowIp(string $allowIp): void
    {
        $this->allowIp = $allowIp;
    }

    /**
     * 获取
     */
    public function getAlowFiles(): string
    {
        return $this->alowFiles;
    }

    /**
     * 设置
     */
    public function setAlowFiles(string $alowFiles): void
    {
        $this->alowFiles = $alowFiles;
    }
}
