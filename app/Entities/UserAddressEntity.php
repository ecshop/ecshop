<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAddressEntity')]
class UserAddressEntity
{
    use DTOHelper;

    const string getAddressId = 'address_id';

    const string getAddressName = 'address_name';

    const string getUserId = 'user_id';

    const string getConsignee = 'consignee';

    const string getEmail = 'email';

    const string getCountry = 'country';

    const string getProvince = 'province';

    const string getCity = 'city';

    const string getDistrict = 'district';

    const string getAddress = 'address';

    const string getZipcode = 'zipcode';

    const string getTel = 'tel';

    const string getMobile = 'mobile';

    const string getSignBuilding = 'sign_building';

    const string getBestTime = 'best_time';

    #[OA\Property(property: 'addressId', description: '', type: 'integer')]
    private int $addressId;

    #[OA\Property(property: 'addressName', description: '', type: 'string')]
    private string $addressName;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'consignee', description: '', type: 'string')]
    private string $consignee;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'country', description: '', type: 'integer')]
    private int $country;

    #[OA\Property(property: 'province', description: '', type: 'integer')]
    private int $province;

    #[OA\Property(property: 'city', description: '', type: 'integer')]
    private int $city;

    #[OA\Property(property: 'district', description: '', type: 'integer')]
    private int $district;

    #[OA\Property(property: 'address', description: '', type: 'string')]
    private string $address;

    #[OA\Property(property: 'zipcode', description: '', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'signBuilding', description: '', type: 'string')]
    private string $signBuilding;

    #[OA\Property(property: 'bestTime', description: '', type: 'string')]
    private string $bestTime;

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
