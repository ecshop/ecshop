<?php

declare(strict_types=1);

namespace app\modules\admin\response\userExtendFields;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserExtendFieldsResponse')]
class UserExtendFieldsResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'regFieldName', description: '注册字段名称', type: 'string')]
    private string $regFieldName;

    #[OA\Property(property: 'disOrder', description: '显示顺序', type: 'integer')]
    private int $disOrder;

    #[OA\Property(property: 'display', description: '是否显示(0隐藏 1显示)', type: 'integer')]
    private int $display;

    #[OA\Property(property: 'type', description: '字段类型(0文本 1单选 2多选 3下拉)', type: 'integer')]
    private int $type;

    #[OA\Property(property: 'isNeed', description: '是否必填(0非必填 1必填)', type: 'integer')]
    private int $isNeed;

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

    public function getRegFieldName(): string
    {
        return $this->regFieldName;
    }

    public function setRegFieldName(string $regFieldName): void
    {
        $this->regFieldName = $regFieldName;
    }

    public function getDisOrder(): int
    {
        return $this->disOrder;
    }

    public function setDisOrder(int $disOrder): void
    {
        $this->disOrder = $disOrder;
    }

    public function getDisplay(): int
    {
        return $this->display;
    }

    public function setDisplay(int $display): void
    {
        $this->display = $display;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getIsNeed(): int
    {
        return $this->isNeed;
    }

    public function setIsNeed(int $isNeed): void
    {
        $this->isNeed = $isNeed;
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
