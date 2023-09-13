<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAddressSchema')]
class UserAddress
{
    use ArrayObject;

    #[OA\Property(property: 'address_id', description: '', type: 'integer')]
    protected int $addressId;

    #[OA\Property(property: 'address_name', description: '', type: 'string')]
    protected string $addressName;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'consignee', description: '', type: 'string')]
    protected string $consignee;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'country', description: '', type: 'integer')]
    protected int $country;

    #[OA\Property(property: 'province', description: '', type: 'integer')]
    protected int $province;

    #[OA\Property(property: 'city', description: '', type: 'integer')]
    protected int $city;

    #[OA\Property(property: 'district', description: '', type: 'integer')]
    protected int $district;

    #[OA\Property(property: 'address', description: '', type: 'string')]
    protected string $address;

    #[OA\Property(property: 'zipcode', description: '', type: 'string')]
    protected string $zipcode;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    protected string $tel;

    #[OA\Property(property: 'mobile', description: '', type: 'string')]
    protected string $mobile;

    #[OA\Property(property: 'sign_building', description: '', type: 'string')]
    protected string $signBuilding;

    #[OA\Property(property: 'best_time', description: '', type: 'string')]
    protected string $bestTime;

    /**
     * 获取
     */
    public function getAddressId(): int
    {
        return $this->addressId;
    }

    /**
     * 设置
     */
    public function setAddressId(int $addressId): void
    {
        $this->addressId = $addressId;
    }

    /**
     * 获取
     */
    public function getAddressName(): string
    {
        return $this->addressName;
    }

    /**
     * 设置
     */
    public function setAddressName(string $addressName): void
    {
        $this->addressName = $addressName;
    }

    /**
     * 获取
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getConsignee(): string
    {
        return $this->consignee;
    }

    /**
     * 设置
     */
    public function setConsignee(string $consignee): void
    {
        $this->consignee = $consignee;
    }

    /**
     * 获取
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * 设置
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    /**
     * 获取
     */
    public function getProvince(): int
    {
        return $this->province;
    }

    /**
     * 设置
     */
    public function setProvince(int $province): void
    {
        $this->province = $province;
    }

    /**
     * 获取
     */
    public function getCity(): int
    {
        return $this->city;
    }

    /**
     * 设置
     */
    public function setCity(int $city): void
    {
        $this->city = $city;
    }

    /**
     * 获取
     */
    public function getDistrict(): int
    {
        return $this->district;
    }

    /**
     * 设置
     */
    public function setDistrict(int $district): void
    {
        $this->district = $district;
    }

    /**
     * 获取
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * 设置
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * 获取
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * 设置
     */
    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * 获取
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * 设置
     */
    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    /**
     * 获取
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * 设置
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * 获取
     */
    public function getSignBuilding(): string
    {
        return $this->signBuilding;
    }

    /**
     * 设置
     */
    public function setSignBuilding(string $signBuilding): void
    {
        $this->signBuilding = $signBuilding;
    }

    /**
     * 获取
     */
    public function getBestTime(): string
    {
        return $this->bestTime;
    }

    /**
     * 设置
     */
    public function setBestTime(string $bestTime): void
    {
        $this->bestTime = $bestTime;
    }
}
