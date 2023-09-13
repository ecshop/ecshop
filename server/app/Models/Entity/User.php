<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserSchema')]
class User
{
    use ArrayObject;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'user_name', description: '', type: 'string')]
    protected string $userName;

    #[OA\Property(property: 'password', description: '', type: 'string')]
    protected string $password;

    #[OA\Property(property: 'question', description: '', type: 'string')]
    protected string $question;

    #[OA\Property(property: 'answer', description: '', type: 'string')]
    protected string $answer;

    #[OA\Property(property: 'sex', description: '', type: 'integer')]
    protected int $sex;

    #[OA\Property(property: 'birthday', description: '', type: 'string')]
    protected string $birthday;

    #[OA\Property(property: 'user_money', description: '', type: 'float')]
    protected float $userMoney;

    #[OA\Property(property: 'frozen_money', description: '', type: 'float')]
    protected float $frozenMoney;

    #[OA\Property(property: 'pay_points', description: '', type: 'integer')]
    protected int $payPoints;

    #[OA\Property(property: 'rank_points', description: '', type: 'integer')]
    protected int $rankPoints;

    #[OA\Property(property: 'address_id', description: '', type: 'integer')]
    protected int $addressId;

    #[OA\Property(property: 'reg_time', description: '', type: 'integer')]
    protected int $regTime;

    #[OA\Property(property: 'last_login', description: '', type: 'integer')]
    protected int $lastLogin;

    #[OA\Property(property: 'last_time', description: '', type: 'string')]
    protected string $lastTime;

    #[OA\Property(property: 'last_ip', description: '', type: 'string')]
    protected string $lastIp;

    #[OA\Property(property: 'visit_count', description: '', type: 'integer')]
    protected int $visitCount;

    #[OA\Property(property: 'user_rank', description: '', type: 'integer')]
    protected int $userRank;

    #[OA\Property(property: 'is_special', description: '', type: 'integer')]
    protected int $isSpecial;

    #[OA\Property(property: 'ec_salt', description: '', type: 'string')]
    protected string $ecSalt;

    #[OA\Property(property: 'salt', description: '', type: 'string')]
    protected string $salt;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'flag', description: '', type: 'integer')]
    protected int $flag;

    #[OA\Property(property: 'alias', description: '', type: 'string')]
    protected string $alias;

    #[OA\Property(property: 'msn', description: '', type: 'string')]
    protected string $msn;

    #[OA\Property(property: 'qq', description: '', type: 'string')]
    protected string $qq;

    #[OA\Property(property: 'office_phone', description: '', type: 'string')]
    protected string $officePhone;

    #[OA\Property(property: 'home_phone', description: '', type: 'string')]
    protected string $homePhone;

    #[OA\Property(property: 'mobile_phone', description: '', type: 'string')]
    protected string $mobilePhone;

    #[OA\Property(property: 'is_validated', description: '', type: 'integer')]
    protected int $isValidated;

    #[OA\Property(property: 'credit_line', description: '', type: 'float')]
    protected float $creditLine;

    #[OA\Property(property: 'passwd_question', description: '', type: 'string')]
    protected string $passwdQuestion;

    #[OA\Property(property: 'passwd_answer', description: '', type: 'string')]
    protected string $passwdAnswer;

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
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * 设置
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * 获取
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * 设置
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * 获取
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * 设置
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * 获取
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * 设置
     */
    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * 获取
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * 设置
     */
    public function setSex(int $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * 获取
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * 设置
     */
    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * 获取
     */
    public function getUserMoney(): float
    {
        return $this->userMoney;
    }

    /**
     * 设置
     */
    public function setUserMoney(float $userMoney): void
    {
        $this->userMoney = $userMoney;
    }

    /**
     * 获取
     */
    public function getFrozenMoney(): float
    {
        return $this->frozenMoney;
    }

    /**
     * 设置
     */
    public function setFrozenMoney(float $frozenMoney): void
    {
        $this->frozenMoney = $frozenMoney;
    }

    /**
     * 获取
     */
    public function getPayPoints(): int
    {
        return $this->payPoints;
    }

    /**
     * 设置
     */
    public function setPayPoints(int $payPoints): void
    {
        $this->payPoints = $payPoints;
    }

    /**
     * 获取
     */
    public function getRankPoints(): int
    {
        return $this->rankPoints;
    }

    /**
     * 设置
     */
    public function setRankPoints(int $rankPoints): void
    {
        $this->rankPoints = $rankPoints;
    }

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
    public function getRegTime(): int
    {
        return $this->regTime;
    }

    /**
     * 设置
     */
    public function setRegTime(int $regTime): void
    {
        $this->regTime = $regTime;
    }

    /**
     * 获取
     */
    public function getLastLogin(): int
    {
        return $this->lastLogin;
    }

    /**
     * 设置
     */
    public function setLastLogin(int $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * 获取
     */
    public function getLastTime(): string
    {
        return $this->lastTime;
    }

    /**
     * 设置
     */
    public function setLastTime(string $lastTime): void
    {
        $this->lastTime = $lastTime;
    }

    /**
     * 获取
     */
    public function getLastIp(): string
    {
        return $this->lastIp;
    }

    /**
     * 设置
     */
    public function setLastIp(string $lastIp): void
    {
        $this->lastIp = $lastIp;
    }

    /**
     * 获取
     */
    public function getVisitCount(): int
    {
        return $this->visitCount;
    }

    /**
     * 设置
     */
    public function setVisitCount(int $visitCount): void
    {
        $this->visitCount = $visitCount;
    }

    /**
     * 获取
     */
    public function getUserRank(): int
    {
        return $this->userRank;
    }

    /**
     * 设置
     */
    public function setUserRank(int $userRank): void
    {
        $this->userRank = $userRank;
    }

    /**
     * 获取
     */
    public function getIsSpecial(): int
    {
        return $this->isSpecial;
    }

    /**
     * 设置
     */
    public function setIsSpecial(int $isSpecial): void
    {
        $this->isSpecial = $isSpecial;
    }

    /**
     * 获取
     */
    public function getEcSalt(): string
    {
        return $this->ecSalt;
    }

    /**
     * 设置
     */
    public function setEcSalt(string $ecSalt): void
    {
        $this->ecSalt = $ecSalt;
    }

    /**
     * 获取
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * 设置
     */
    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    /**
     * 获取
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * 设置
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取
     */
    public function getFlag(): int
    {
        return $this->flag;
    }

    /**
     * 设置
     */
    public function setFlag(int $flag): void
    {
        $this->flag = $flag;
    }

    /**
     * 获取
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * 设置
     */
    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    /**
     * 获取
     */
    public function getMsn(): string
    {
        return $this->msn;
    }

    /**
     * 设置
     */
    public function setMsn(string $msn): void
    {
        $this->msn = $msn;
    }

    /**
     * 获取
     */
    public function getQq(): string
    {
        return $this->qq;
    }

    /**
     * 设置
     */
    public function setQq(string $qq): void
    {
        $this->qq = $qq;
    }

    /**
     * 获取
     */
    public function getOfficePhone(): string
    {
        return $this->officePhone;
    }

    /**
     * 设置
     */
    public function setOfficePhone(string $officePhone): void
    {
        $this->officePhone = $officePhone;
    }

    /**
     * 获取
     */
    public function getHomePhone(): string
    {
        return $this->homePhone;
    }

    /**
     * 设置
     */
    public function setHomePhone(string $homePhone): void
    {
        $this->homePhone = $homePhone;
    }

    /**
     * 获取
     */
    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    /**
     * 设置
     */
    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * 获取
     */
    public function getIsValidated(): int
    {
        return $this->isValidated;
    }

    /**
     * 设置
     */
    public function setIsValidated(int $isValidated): void
    {
        $this->isValidated = $isValidated;
    }

    /**
     * 获取
     */
    public function getCreditLine(): float
    {
        return $this->creditLine;
    }

    /**
     * 设置
     */
    public function setCreditLine(float $creditLine): void
    {
        $this->creditLine = $creditLine;
    }

    /**
     * 获取
     */
    public function getPasswdQuestion(): string
    {
        return $this->passwdQuestion;
    }

    /**
     * 设置
     */
    public function setPasswdQuestion(string $passwdQuestion): void
    {
        $this->passwdQuestion = $passwdQuestion;
    }

    /**
     * 获取
     */
    public function getPasswdAnswer(): string
    {
        return $this->passwdAnswer;
    }

    /**
     * 设置
     */
    public function setPasswdAnswer(string $passwdAnswer): void
    {
        $this->passwdAnswer = $passwdAnswer;
    }
}
