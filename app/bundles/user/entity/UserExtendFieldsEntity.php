<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserExtendFieldsEntity')]
class UserExtendFieldsEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'reg_field_name', description: '注册字段名称', type: 'string')]
    private string $reg_field_name;

    #[OA\Property(property: 'dis_order', description: '显示顺序', type: 'integer')]
    private int $dis_order;

    #[OA\Property(property: 'display', description: '是否显示(0隐藏 1显示)', type: 'integer')]
    private int $display;

    #[OA\Property(property: 'type', description: '字段类型(0文本 1单选 2多选 3下拉)', type: 'integer')]
    private int $type;

    #[OA\Property(property: 'is_need', description: '是否必填(0非必填 1必填)', type: 'integer')]
    private int $is_need;

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

    public function getRegFieldName(): string
    {
        return $this->reg_field_name;
    }

    public function setRegFieldName(string $regFieldName): void
    {
        $this->reg_field_name = $regFieldName;
    }

    public function getDisOrder(): int
    {
        return $this->dis_order;
    }

    public function setDisOrder(int $disOrder): void
    {
        $this->dis_order = $disOrder;
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
        return $this->is_need;
    }

    public function setIsNeed(int $isNeed): void
    {
        $this->is_need = $isNeed;
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
