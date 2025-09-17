<?php

declare(strict_types=1);

namespace app\modules\admin\response\userAddress;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAddressResponse')]
class UserAddressResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '地址ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'addressName', description: '地址名称', type: 'string')]
    private string $addressName;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'consignee', description: '收货人姓名', type: 'string')]
    private string $consignee;

    #[OA\Property(property: 'email', description: '电子邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'country', description: '国家ID', type: 'integer')]
    private int $country;

    #[OA\Property(property: 'province', description: '省份ID', type: 'integer')]
    private int $province;

    #[OA\Property(property: 'city', description: '城市ID', type: 'integer')]
    private int $city;

    #[OA\Property(property: 'district', description: '区县ID', type: 'integer')]
    private int $district;

    #[OA\Property(property: 'address', description: '详细地址', type: 'string')]
    private string $address;

    #[OA\Property(property: 'zipcode', description: '邮政编码', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '固定电话', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '手机号码', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'signBuilding', description: '标志性建筑', type: 'string')]
    private string $signBuilding;

    #[OA\Property(property: 'bestTime', description: '最佳送货时间', type: 'string')]
    private string $bestTime;

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

    public function getAddressName(): string
    {
        return $this->addressName;
    }

    public function setAddressName(string $addressName): void
    {
        $this->addressName = $addressName;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getConsignee(): string
    {
        return $this->consignee;
    }

    public function setConsignee(string $consignee): void
    {
        $this->consignee = $consignee;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCountry(): int
    {
        return $this->country;
    }

    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    public function getProvince(): int
    {
        return $this->province;
    }

    public function setProvince(int $province): void
    {
        $this->province = $province;
    }

    public function getCity(): int
    {
        return $this->city;
    }

    public function setCity(int $city): void
    {
        $this->city = $city;
    }

    public function getDistrict(): int
    {
        return $this->district;
    }

    public function setDistrict(int $district): void
    {
        $this->district = $district;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    public function getSignBuilding(): string
    {
        return $this->signBuilding;
    }

    public function setSignBuilding(string $signBuilding): void
    {
        $this->signBuilding = $signBuilding;
    }

    public function getBestTime(): string
    {
        return $this->bestTime;
    }

    public function setBestTime(string $bestTime): void
    {
        $this->bestTime = $bestTime;
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
