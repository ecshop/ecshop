<?php

namespace App\Models\Entity;

/**
 * Class UserAddressEntity
 * @package App\Models\Entity
 */
class UserAddressEntity
{
    /**
     * @var int 
     */
    private int $address_id;

    /**
     * @var string 
     */
    private string $address_name;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $consignee;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var int 
     */
    private int $country;

    /**
     * @var int 
     */
    private int $province;

    /**
     * @var int 
     */
    private int $city;

    /**
     * @var int 
     */
    private int $district;

    /**
     * @var string 
     */
    private string $address;

    /**
     * @var string 
     */
    private string $zipcode;

    /**
     * @var string 
     */
    private string $tel;

    /**
     * @var string 
     */
    private string $mobile;

    /**
     * @var string 
     */
    private string $sign_building;

    /**
     * @var string 
     */
    private string $best_time;

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->address_id;
    }

    /**
     * @param int $value
     */
    public function setAddressId(int $value)
    {
        $this->address_id = $value;
    }

    /**
     * @return string
     */
    public function getAddressName(): string
    {
        return $this->address_name;
    }

    /**
     * @param string $value
     */
    public function setAddressName(string $value)
    {
        $this->address_name = $value;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
    }

    /**
     * @return string
     */
    public function getConsignee(): string
    {
        return $this->consignee;
    }

    /**
     * @param string $value
     */
    public function setConsignee(string $value)
    {
        $this->consignee = $value;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value)
    {
        $this->email = $value;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @param int $value
     */
    public function setCountry(int $value)
    {
        $this->country = $value;
    }

    /**
     * @return int
     */
    public function getProvince(): int
    {
        return $this->province;
    }

    /**
     * @param int $value
     */
    public function setProvince(int $value)
    {
        $this->province = $value;
    }

    /**
     * @return int
     */
    public function getCity(): int
    {
        return $this->city;
    }

    /**
     * @param int $value
     */
    public function setCity(int $value)
    {
        $this->city = $value;
    }

    /**
     * @return int
     */
    public function getDistrict(): int
    {
        return $this->district;
    }

    /**
     * @param int $value
     */
    public function setDistrict(int $value)
    {
        $this->district = $value;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $value
     */
    public function setAddress(string $value)
    {
        $this->address = $value;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $value
     */
    public function setZipcode(string $value)
    {
        $this->zipcode = $value;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * @param string $value
     */
    public function setTel(string $value)
    {
        $this->tel = $value;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $value
     */
    public function setMobile(string $value)
    {
        $this->mobile = $value;
    }

    /**
     * @return string
     */
    public function getSignBuilding(): string
    {
        return $this->sign_building;
    }

    /**
     * @param string $value
     */
    public function setSignBuilding(string $value)
    {
        $this->sign_building = $value;
    }

    /**
     * @return string
     */
    public function getBestTime(): string
    {
        return $this->best_time;
    }

    /**
     * @param string $value
     */
    public function setBestTime(string $value)
    {
        $this->best_time = $value;
    }

}
