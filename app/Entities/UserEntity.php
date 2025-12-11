<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserEntity')]
class UserEntity
{
    use DTOHelper;

    const string getUserId = 'user_id';

    const string getEmail = 'email';

    const string getUserName = 'user_name';

    const string getPassword = 'password';

    const string getQuestion = 'question';

    const string getAnswer = 'answer';

    const string getSex = 'sex';

    const string getBirthday = 'birthday';

    const string getUserMoney = 'user_money';

    const string getFrozenMoney = 'frozen_money';

    const string getPayPoints = 'pay_points';

    const string getRankPoints = 'rank_points';

    const string getAddressId = 'address_id';

    const string getRegTime = 'reg_time';

    const string getLastLogin = 'last_login';

    const string getLastTime = 'last_time';

    const string getLastIp = 'last_ip';

    const string getVisitCount = 'visit_count';

    const string getUserRank = 'user_rank';

    const string getIsSpecial = 'is_special';

    const string getEcSalt = 'ec_salt';

    const string getSalt = 'salt';

    const string getParentId = 'parent_id';

    const string getFlag = 'flag';

    const string getAlias = 'alias';

    const string getMsn = 'msn';

    const string getQq = 'qq';

    const string getOfficePhone = 'office_phone';

    const string getHomePhone = 'home_phone';

    const string getMobilePhone = 'mobile_phone';

    const string getIsValidated = 'is_validated';

    const string getCreditLine = 'credit_line';

    const string getPasswdQuestion = 'passwd_question';

    const string getPasswdAnswer = 'passwd_answer';

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'userName', description: '', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'password', description: '', type: 'string')]
    private string $password;

    #[OA\Property(property: 'question', description: '', type: 'string')]
    private string $question;

    #[OA\Property(property: 'answer', description: '', type: 'string')]
    private string $answer;

    #[OA\Property(property: 'sex', description: '', type: 'integer')]
    private int $sex;

    #[OA\Property(property: 'birthday', description: '', type: 'string')]
    private string $birthday;

    #[OA\Property(property: 'userMoney', description: '', type: 'string')]
    private string $userMoney;

    #[OA\Property(property: 'frozenMoney', description: '', type: 'string')]
    private string $frozenMoney;

    #[OA\Property(property: 'payPoints', description: '', type: 'integer')]
    private int $payPoints;

    #[OA\Property(property: 'rankPoints', description: '', type: 'integer')]
    private int $rankPoints;

    #[OA\Property(property: 'addressId', description: '', type: 'integer')]
    private int $addressId;

    #[OA\Property(property: 'regTime', description: '', type: 'integer')]
    private int $regTime;

    #[OA\Property(property: 'lastLogin', description: '', type: 'integer')]
    private int $lastLogin;

    #[OA\Property(property: 'lastTime', description: '', type: 'string')]
    private string $lastTime;

    #[OA\Property(property: 'lastIp', description: '', type: 'string')]
    private string $lastIp;

    #[OA\Property(property: 'visitCount', description: '', type: 'integer')]
    private int $visitCount;

    #[OA\Property(property: 'userRank', description: '', type: 'integer')]
    private int $userRank;

    #[OA\Property(property: 'isSpecial', description: '', type: 'integer')]
    private int $isSpecial;

    #[OA\Property(property: 'ecSalt', description: '', type: 'string')]
    private string $ecSalt;

    #[OA\Property(property: 'salt', description: '', type: 'string')]
    private string $salt;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'flag', description: '', type: 'integer')]
    private int $flag;

    #[OA\Property(property: 'alias', description: '', type: 'string')]
    private string $alias;

    #[OA\Property(property: 'msn', description: '', type: 'string')]
    private string $msn;

    #[OA\Property(property: 'qq', description: '', type: 'string')]
    private string $qq;

    #[OA\Property(property: 'officePhone', description: '', type: 'string')]
    private string $officePhone;

    #[OA\Property(property: 'homePhone', description: '', type: 'string')]
    private string $homePhone;

    #[OA\Property(property: 'mobilePhone', description: '', type: 'string')]
    private string $mobilePhone;

    #[OA\Property(property: 'isValidated', description: '', type: 'integer')]
    private int $isValidated;

    #[OA\Property(property: 'creditLine', description: '', type: 'string')]
    private string $creditLine;

    #[OA\Property(property: 'passwdQuestion', description: '', type: 'string')]
    private string $passwdQuestion;

    #[OA\Property(property: 'passwdAnswer', description: '', type: 'string')]
    private string $passwdAnswer;

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
    public function getUserMoney(): string
    {
        return $this->userMoney;
    }

    /**
     * 设置
     */
    public function setUserMoney(string $userMoney): void
    {
        $this->userMoney = $userMoney;
    }

    /**
     * 获取
     */
    public function getFrozenMoney(): string
    {
        return $this->frozenMoney;
    }

    /**
     * 设置
     */
    public function setFrozenMoney(string $frozenMoney): void
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
    public function getCreditLine(): string
    {
        return $this->creditLine;
    }

    /**
     * 设置
     */
    public function setCreditLine(string $creditLine): void
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
