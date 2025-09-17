<?php

declare(strict_types=1);

namespace app\modules\admin\response\user;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserResponse')]
class UserResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '用户ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '电子邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'userName', description: '用户名', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'password', description: '登录密码', type: 'string')]
    private string $password;

    #[OA\Property(property: 'question', description: '安全问题', type: 'string')]
    private string $question;

    #[OA\Property(property: 'answer', description: '安全问题答案', type: 'string')]
    private string $answer;

    #[OA\Property(property: 'sex', description: '性别(0未知 1男 2女)', type: 'integer')]
    private int $sex;

    #[OA\Property(property: 'birthday', description: '生日', type: 'string')]
    private string $birthday;

    #[OA\Property(property: 'userMoney', description: '用户资金', type: 'float')]
    private float $userMoney;

    #[OA\Property(property: 'frozenMoney', description: '冻结资金', type: 'float')]
    private float $frozenMoney;

    #[OA\Property(property: 'payPoints', description: '消费积分', type: 'integer')]
    private int $payPoints;

    #[OA\Property(property: 'rankPoints', description: '等级积分', type: 'integer')]
    private int $rankPoints;

    #[OA\Property(property: 'addressId', description: '默认地址ID', type: 'integer')]
    private int $addressId;

    #[OA\Property(property: 'regTime', description: '注册时间戳', type: 'integer')]
    private int $regTime;

    #[OA\Property(property: 'lastLogin', description: '最后登录时间戳', type: 'integer')]
    private int $lastLogin;

    #[OA\Property(property: 'lastTime', description: '最后活动时间', type: 'string')]
    private string $lastTime;

    #[OA\Property(property: 'lastIp', description: '最后登录IP', type: 'string')]
    private string $lastIp;

    #[OA\Property(property: 'visitCount', description: '访问次数', type: 'integer')]
    private int $visitCount;

    #[OA\Property(property: 'userRank', description: '用户等级', type: 'integer')]
    private int $userRank;

    #[OA\Property(property: 'isSpecial', description: '是否特殊用户', type: 'integer')]
    private int $isSpecial;

    #[OA\Property(property: 'ecSalt', description: '加密盐值', type: 'string')]
    private string $ecSalt;

    #[OA\Property(property: 'salt', description: '密码盐值', type: 'string')]
    private string $salt;

    #[OA\Property(property: 'parentId', description: '推荐人ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'flag', description: '用户标记', type: 'integer')]
    private int $flag;

    #[OA\Property(property: 'alias', description: '昵称', type: 'string')]
    private string $alias;

    #[OA\Property(property: 'msn', description: 'MSN账号', type: 'string')]
    private string $msn;

    #[OA\Property(property: 'qq', description: 'QQ号码', type: 'string')]
    private string $qq;

    #[OA\Property(property: 'officePhone', description: '办公电话', type: 'string')]
    private string $officePhone;

    #[OA\Property(property: 'homePhone', description: '家庭电话', type: 'string')]
    private string $homePhone;

    #[OA\Property(property: 'mobilePhone', description: '手机号码', type: 'string')]
    private string $mobilePhone;

    #[OA\Property(property: 'isValidated', description: '是否已验证', type: 'integer')]
    private int $isValidated;

    #[OA\Property(property: 'creditLine', description: '信用额度', type: 'float')]
    private float $creditLine;

    #[OA\Property(property: 'passwdQuestion', description: '密码提示问题', type: 'string')]
    private string $passwdQuestion;

    #[OA\Property(property: 'passwdAnswer', description: '密码提示答案', type: 'string')]
    private string $passwdAnswer;

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    public function getSex(): int
    {
        return $this->sex;
    }

    public function setSex(int $sex): void
    {
        $this->sex = $sex;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getUserMoney(): float
    {
        return $this->userMoney;
    }

    public function setUserMoney(float $userMoney): void
    {
        $this->userMoney = $userMoney;
    }

    public function getFrozenMoney(): float
    {
        return $this->frozenMoney;
    }

    public function setFrozenMoney(float $frozenMoney): void
    {
        $this->frozenMoney = $frozenMoney;
    }

    public function getPayPoints(): int
    {
        return $this->payPoints;
    }

    public function setPayPoints(int $payPoints): void
    {
        $this->payPoints = $payPoints;
    }

    public function getRankPoints(): int
    {
        return $this->rankPoints;
    }

    public function setRankPoints(int $rankPoints): void
    {
        $this->rankPoints = $rankPoints;
    }

    public function getAddressId(): int
    {
        return $this->addressId;
    }

    public function setAddressId(int $addressId): void
    {
        $this->addressId = $addressId;
    }

    public function getRegTime(): int
    {
        return $this->regTime;
    }

    public function setRegTime(int $regTime): void
    {
        $this->regTime = $regTime;
    }

    public function getLastLogin(): int
    {
        return $this->lastLogin;
    }

    public function setLastLogin(int $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getLastTime(): string
    {
        return $this->lastTime;
    }

    public function setLastTime(string $lastTime): void
    {
        $this->lastTime = $lastTime;
    }

    public function getLastIp(): string
    {
        return $this->lastIp;
    }

    public function setLastIp(string $lastIp): void
    {
        $this->lastIp = $lastIp;
    }

    public function getVisitCount(): int
    {
        return $this->visitCount;
    }

    public function setVisitCount(int $visitCount): void
    {
        $this->visitCount = $visitCount;
    }

    public function getUserRank(): int
    {
        return $this->userRank;
    }

    public function setUserRank(int $userRank): void
    {
        $this->userRank = $userRank;
    }

    public function getIsSpecial(): int
    {
        return $this->isSpecial;
    }

    public function setIsSpecial(int $isSpecial): void
    {
        $this->isSpecial = $isSpecial;
    }

    public function getEcSalt(): string
    {
        return $this->ecSalt;
    }

    public function setEcSalt(string $ecSalt): void
    {
        $this->ecSalt = $ecSalt;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getFlag(): int
    {
        return $this->flag;
    }

    public function setFlag(int $flag): void
    {
        $this->flag = $flag;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    public function getMsn(): string
    {
        return $this->msn;
    }

    public function setMsn(string $msn): void
    {
        $this->msn = $msn;
    }

    public function getQq(): string
    {
        return $this->qq;
    }

    public function setQq(string $qq): void
    {
        $this->qq = $qq;
    }

    public function getOfficePhone(): string
    {
        return $this->officePhone;
    }

    public function setOfficePhone(string $officePhone): void
    {
        $this->officePhone = $officePhone;
    }

    public function getHomePhone(): string
    {
        return $this->homePhone;
    }

    public function setHomePhone(string $homePhone): void
    {
        $this->homePhone = $homePhone;
    }

    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    public function getIsValidated(): int
    {
        return $this->isValidated;
    }

    public function setIsValidated(int $isValidated): void
    {
        $this->isValidated = $isValidated;
    }

    public function getCreditLine(): float
    {
        return $this->creditLine;
    }

    public function setCreditLine(float $creditLine): void
    {
        $this->creditLine = $creditLine;
    }

    public function getPasswdQuestion(): string
    {
        return $this->passwdQuestion;
    }

    public function setPasswdQuestion(string $passwdQuestion): void
    {
        $this->passwdQuestion = $passwdQuestion;
    }

    public function getPasswdAnswer(): string
    {
        return $this->passwdAnswer;
    }

    public function setPasswdAnswer(string $passwdAnswer): void
    {
        $this->passwdAnswer = $passwdAnswer;
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
