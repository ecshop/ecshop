<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserEntity')]
class UserEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '用户ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '电子邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'user_name', description: '用户名', type: 'string')]
    private string $user_name;

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

    #[OA\Property(property: 'user_money', description: '用户资金', type: 'float')]
    private float $user_money;

    #[OA\Property(property: 'frozen_money', description: '冻结资金', type: 'float')]
    private float $frozen_money;

    #[OA\Property(property: 'pay_points', description: '消费积分', type: 'integer')]
    private int $pay_points;

    #[OA\Property(property: 'rank_points', description: '等级积分', type: 'integer')]
    private int $rank_points;

    #[OA\Property(property: 'address_id', description: '默认地址ID', type: 'integer')]
    private int $address_id;

    #[OA\Property(property: 'reg_time', description: '注册时间戳', type: 'integer')]
    private int $reg_time;

    #[OA\Property(property: 'last_login', description: '最后登录时间戳', type: 'integer')]
    private int $last_login;

    #[OA\Property(property: 'last_time', description: '最后活动时间', type: 'string')]
    private string $last_time;

    #[OA\Property(property: 'last_ip', description: '最后登录IP', type: 'string')]
    private string $last_ip;

    #[OA\Property(property: 'visit_count', description: '访问次数', type: 'integer')]
    private int $visit_count;

    #[OA\Property(property: 'user_rank', description: '用户等级', type: 'integer')]
    private int $user_rank;

    #[OA\Property(property: 'is_special', description: '是否特殊用户', type: 'integer')]
    private int $is_special;

    #[OA\Property(property: 'ec_salt', description: '加密盐值', type: 'string')]
    private string $ec_salt;

    #[OA\Property(property: 'salt', description: '密码盐值', type: 'string')]
    private string $salt;

    #[OA\Property(property: 'parent_id', description: '推荐人ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'flag', description: '用户标记', type: 'integer')]
    private int $flag;

    #[OA\Property(property: 'alias', description: '昵称', type: 'string')]
    private string $alias;

    #[OA\Property(property: 'msn', description: 'MSN账号', type: 'string')]
    private string $msn;

    #[OA\Property(property: 'qq', description: 'QQ号码', type: 'string')]
    private string $qq;

    #[OA\Property(property: 'office_phone', description: '办公电话', type: 'string')]
    private string $office_phone;

    #[OA\Property(property: 'home_phone', description: '家庭电话', type: 'string')]
    private string $home_phone;

    #[OA\Property(property: 'mobile_phone', description: '手机号码', type: 'string')]
    private string $mobile_phone;

    #[OA\Property(property: 'is_validated', description: '是否已验证', type: 'integer')]
    private int $is_validated;

    #[OA\Property(property: 'credit_line', description: '信用额度', type: 'float')]
    private float $credit_line;

    #[OA\Property(property: 'passwd_question', description: '密码提示问题', type: 'string')]
    private string $passwd_question;

    #[OA\Property(property: 'passwd_answer', description: '密码提示答案', type: 'string')]
    private string $passwd_answer;

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
        return $this->user_name;
    }

    public function setUserName(string $userName): void
    {
        $this->user_name = $userName;
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
        return $this->user_money;
    }

    public function setUserMoney(float $userMoney): void
    {
        $this->user_money = $userMoney;
    }

    public function getFrozenMoney(): float
    {
        return $this->frozen_money;
    }

    public function setFrozenMoney(float $frozenMoney): void
    {
        $this->frozen_money = $frozenMoney;
    }

    public function getPayPoints(): int
    {
        return $this->pay_points;
    }

    public function setPayPoints(int $payPoints): void
    {
        $this->pay_points = $payPoints;
    }

    public function getRankPoints(): int
    {
        return $this->rank_points;
    }

    public function setRankPoints(int $rankPoints): void
    {
        $this->rank_points = $rankPoints;
    }

    public function getAddressId(): int
    {
        return $this->address_id;
    }

    public function setAddressId(int $addressId): void
    {
        $this->address_id = $addressId;
    }

    public function getRegTime(): int
    {
        return $this->reg_time;
    }

    public function setRegTime(int $regTime): void
    {
        $this->reg_time = $regTime;
    }

    public function getLastLogin(): int
    {
        return $this->last_login;
    }

    public function setLastLogin(int $lastLogin): void
    {
        $this->last_login = $lastLogin;
    }

    public function getLastTime(): string
    {
        return $this->last_time;
    }

    public function setLastTime(string $lastTime): void
    {
        $this->last_time = $lastTime;
    }

    public function getLastIp(): string
    {
        return $this->last_ip;
    }

    public function setLastIp(string $lastIp): void
    {
        $this->last_ip = $lastIp;
    }

    public function getVisitCount(): int
    {
        return $this->visit_count;
    }

    public function setVisitCount(int $visitCount): void
    {
        $this->visit_count = $visitCount;
    }

    public function getUserRank(): int
    {
        return $this->user_rank;
    }

    public function setUserRank(int $userRank): void
    {
        $this->user_rank = $userRank;
    }

    public function getIsSpecial(): int
    {
        return $this->is_special;
    }

    public function setIsSpecial(int $isSpecial): void
    {
        $this->is_special = $isSpecial;
    }

    public function getEcSalt(): string
    {
        return $this->ec_salt;
    }

    public function setEcSalt(string $ecSalt): void
    {
        $this->ec_salt = $ecSalt;
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
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
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
        return $this->office_phone;
    }

    public function setOfficePhone(string $officePhone): void
    {
        $this->office_phone = $officePhone;
    }

    public function getHomePhone(): string
    {
        return $this->home_phone;
    }

    public function setHomePhone(string $homePhone): void
    {
        $this->home_phone = $homePhone;
    }

    public function getMobilePhone(): string
    {
        return $this->mobile_phone;
    }

    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobile_phone = $mobilePhone;
    }

    public function getIsValidated(): int
    {
        return $this->is_validated;
    }

    public function setIsValidated(int $isValidated): void
    {
        $this->is_validated = $isValidated;
    }

    public function getCreditLine(): float
    {
        return $this->credit_line;
    }

    public function setCreditLine(float $creditLine): void
    {
        $this->credit_line = $creditLine;
    }

    public function getPasswdQuestion(): string
    {
        return $this->passwd_question;
    }

    public function setPasswdQuestion(string $passwdQuestion): void
    {
        $this->passwd_question = $passwdQuestion;
    }

    public function getPasswdAnswer(): string
    {
        return $this->passwd_answer;
    }

    public function setPasswdAnswer(string $passwdAnswer): void
    {
        $this->passwd_answer = $passwdAnswer;
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
