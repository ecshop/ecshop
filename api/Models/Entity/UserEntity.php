<?php

namespace App\Models\Entity;

/**
 * Class UserEntity
 * @package App\Models\Entity
 */
class UserEntity
{
    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var int 
     */
    private int $email_validated;

    /**
     * @var string 
     */
    private string $user_name;

    /**
     * @var string 
     */
    private string $password;

    /**
     * @var string 
     */
    private string $name;

    /**
     * @var string 
     */
    private string $avatar;

    /**
     * @var string 
     */
    private string $question;

    /**
     * @var string 
     */
    private string $answer;

    /**
     * @var int 
     */
    private int $sex;

    /**
     * @var date 
     */
    private date $birthday;

    /**
     * @var float 
     */
    private float $user_money;

    /**
     * @var float 
     */
    private float $frozen_money;

    /**
     * @var int 
     */
    private int $pay_points;

    /**
     * @var int 
     */
    private int $rank_points;

    /**
     * @var int 
     */
    private int $address_id;

    /**
     * @var int 
     */
    private int $reg_time;

    /**
     * @var int 
     */
    private int $last_login;

    /**
     * @var \DateTime 
     */
    private \DateTime $last_time;

    /**
     * @var string 
     */
    private string $last_ip;

    /**
     * @var int 
     */
    private int $visit_count;

    /**
     * @var int 
     */
    private int $user_rank;

    /**
     * @var int 
     */
    private int $is_special;

    /**
     * @var string 
     */
    private string $ec_salt;

    /**
     * @var string 
     */
    private string $salt;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var int 
     */
    private int $flag;

    /**
     * @var string 
     */
    private string $alias;

    /**
     * @var string 
     */
    private string $msn;

    /**
     * @var string 
     */
    private string $qq;

    /**
     * @var string 
     */
    private string $office_phone;

    /**
     * @var string 
     */
    private string $home_phone;

    /**
     * @var string 
     */
    private string $mobile_phone;

    /**
     * @var int 
     */
    private int $mobile_validated;

    /**
     * @var int 
     */
    private int $is_validated;

    /**
     * @var float 
     */
    private float $credit_line;

    /**
     * @var string 
     */
    private string $passwd_question;

    /**
     * @var string 
     */
    private string $passwd_answer;

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
    public function getEmailValidated(): int
    {
        return $this->email_validated;
    }

    /**
     * @param int $value
     */
    public function setEmailValidated(int $value)
    {
        $this->email_validated = $value;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $value
     */
    public function setUserName(string $value)
    {
        $this->user_name = $value;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $value
     */
    public function setPassword(string $value)
    {
        $this->password = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value)
    {
        $this->name = $value;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $value
     */
    public function setAvatar(string $value)
    {
        $this->avatar = $value;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $value
     */
    public function setQuestion(string $value)
    {
        $this->question = $value;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $value
     */
    public function setAnswer(string $value)
    {
        $this->answer = $value;
    }

    /**
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * @param int $value
     */
    public function setSex(int $value)
    {
        $this->sex = $value;
    }

    /**
     * @return date
     */
    public function getBirthday(): date
    {
        return $this->birthday;
    }

    /**
     * @param date $value
     */
    public function setBirthday(date $value)
    {
        $this->birthday = $value;
    }

    /**
     * @return float
     */
    public function getUserMoney(): float
    {
        return $this->user_money;
    }

    /**
     * @param float $value
     */
    public function setUserMoney(float $value)
    {
        $this->user_money = $value;
    }

    /**
     * @return float
     */
    public function getFrozenMoney(): float
    {
        return $this->frozen_money;
    }

    /**
     * @param float $value
     */
    public function setFrozenMoney(float $value)
    {
        $this->frozen_money = $value;
    }

    /**
     * @return int
     */
    public function getPayPoints(): int
    {
        return $this->pay_points;
    }

    /**
     * @param int $value
     */
    public function setPayPoints(int $value)
    {
        $this->pay_points = $value;
    }

    /**
     * @return int
     */
    public function getRankPoints(): int
    {
        return $this->rank_points;
    }

    /**
     * @param int $value
     */
    public function setRankPoints(int $value)
    {
        $this->rank_points = $value;
    }

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
     * @return int
     */
    public function getRegTime(): int
    {
        return $this->reg_time;
    }

    /**
     * @param int $value
     */
    public function setRegTime(int $value)
    {
        $this->reg_time = $value;
    }

    /**
     * @return int
     */
    public function getLastLogin(): int
    {
        return $this->last_login;
    }

    /**
     * @param int $value
     */
    public function setLastLogin(int $value)
    {
        $this->last_login = $value;
    }

    /**
     * @return \DateTime
     */
    public function getLastTime(): \DateTime
    {
        return $this->last_time;
    }

    /**
     * @param \DateTime $value
     */
    public function setLastTime(\DateTime $value)
    {
        $this->last_time = $value;
    }

    /**
     * @return string
     */
    public function getLastIp(): string
    {
        return $this->last_ip;
    }

    /**
     * @param string $value
     */
    public function setLastIp(string $value)
    {
        $this->last_ip = $value;
    }

    /**
     * @return int
     */
    public function getVisitCount(): int
    {
        return $this->visit_count;
    }

    /**
     * @param int $value
     */
    public function setVisitCount(int $value)
    {
        $this->visit_count = $value;
    }

    /**
     * @return int
     */
    public function getUserRank(): int
    {
        return $this->user_rank;
    }

    /**
     * @param int $value
     */
    public function setUserRank(int $value)
    {
        $this->user_rank = $value;
    }

    /**
     * @return int
     */
    public function getIsSpecial(): int
    {
        return $this->is_special;
    }

    /**
     * @param int $value
     */
    public function setIsSpecial(int $value)
    {
        $this->is_special = $value;
    }

    /**
     * @return string
     */
    public function getEcSalt(): string
    {
        return $this->ec_salt;
    }

    /**
     * @param string $value
     */
    public function setEcSalt(string $value)
    {
        $this->ec_salt = $value;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $value
     */
    public function setSalt(string $value)
    {
        $this->salt = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
    }

    /**
     * @return int
     */
    public function getFlag(): int
    {
        return $this->flag;
    }

    /**
     * @param int $value
     */
    public function setFlag(int $value)
    {
        $this->flag = $value;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $value
     */
    public function setAlias(string $value)
    {
        $this->alias = $value;
    }

    /**
     * @return string
     */
    public function getMsn(): string
    {
        return $this->msn;
    }

    /**
     * @param string $value
     */
    public function setMsn(string $value)
    {
        $this->msn = $value;
    }

    /**
     * @return string
     */
    public function getQq(): string
    {
        return $this->qq;
    }

    /**
     * @param string $value
     */
    public function setQq(string $value)
    {
        $this->qq = $value;
    }

    /**
     * @return string
     */
    public function getOfficePhone(): string
    {
        return $this->office_phone;
    }

    /**
     * @param string $value
     */
    public function setOfficePhone(string $value)
    {
        $this->office_phone = $value;
    }

    /**
     * @return string
     */
    public function getHomePhone(): string
    {
        return $this->home_phone;
    }

    /**
     * @param string $value
     */
    public function setHomePhone(string $value)
    {
        $this->home_phone = $value;
    }

    /**
     * @return string
     */
    public function getMobilePhone(): string
    {
        return $this->mobile_phone;
    }

    /**
     * @param string $value
     */
    public function setMobilePhone(string $value)
    {
        $this->mobile_phone = $value;
    }

    /**
     * @return int
     */
    public function getMobileValidated(): int
    {
        return $this->mobile_validated;
    }

    /**
     * @param int $value
     */
    public function setMobileValidated(int $value)
    {
        $this->mobile_validated = $value;
    }

    /**
     * @return int
     */
    public function getIsValidated(): int
    {
        return $this->is_validated;
    }

    /**
     * @param int $value
     */
    public function setIsValidated(int $value)
    {
        $this->is_validated = $value;
    }

    /**
     * @return float
     */
    public function getCreditLine(): float
    {
        return $this->credit_line;
    }

    /**
     * @param float $value
     */
    public function setCreditLine(float $value)
    {
        $this->credit_line = $value;
    }

    /**
     * @return string
     */
    public function getPasswdQuestion(): string
    {
        return $this->passwd_question;
    }

    /**
     * @param string $value
     */
    public function setPasswdQuestion(string $value)
    {
        $this->passwd_question = $value;
    }

    /**
     * @return string
     */
    public function getPasswdAnswer(): string
    {
        return $this->passwd_answer;
    }

    /**
     * @param string $value
     */
    public function setPasswdAnswer(string $value)
    {
        $this->passwd_answer = $value;
    }

}
