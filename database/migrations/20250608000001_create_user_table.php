<?php

use think\migration\db\Column;
use think\migration\Migrator;

class CreateUserTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('user')->setComment('用户表');
        $table
            ->addColumn(Column::string('name')->setComment('昵称'))
            ->addColumn(Column::string('avatar')->setComment('头像'))
            ->addColumn(Column::date('birthday')->setComment('生日'))
            ->addColumn(Column::string('motto')->setComment('座右铭'))
            ->addColumn(Column::string('email')->setUnique()->setComment('电子邮箱'))
            ->addColumn(Column::dateTime('email_verified_time')->setNullable()->setComment('电子邮箱验证时间'))
            ->addColumn(Column::string('mobile')->setUnique()->setComment('手机号码'))
            ->addColumn(Column::dateTime('mobile_verified_time')->setNullable()->setComment('手机号码验证时间'))
            ->addColumn(Column::string('remember_token')->setComment('Remember Token'))
            ->addColumn(Column::string('reset_token')->setComment('密码重置hash'))
            ->addColumn(Column::string('last_login_ip')->setComment('最后登录IP'))
            ->addColumn(Column::dateTime('last_login_time')->setComment('最后登录时间'))
            ->addColumn(Column::tinyInteger('status')->setUnsigned()->setComment('状态：1正常，2禁用'))
            ->addTimestamps()
            ->addSoftDelete()
            ->save();
    }
}
