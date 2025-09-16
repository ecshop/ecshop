<?php

use think\migration\db\Column;
use think\migration\Migrator;

class CreateAuthTable extends Migrator
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
        $table = $this->table('auth')->setComment('用户认证表');
        $table
            ->addColumn(Column::integer('user_id')->setComment('用户ID'))
            ->addColumn(Column::string('identity_type')->setUnique()->setComment('认证类型：账号、邮箱、手机号、微信openid等'))
            ->addColumn(Column::string('identifier')->setComment('标识符：如账号、邮箱、手机号、微信openid等'))
            ->addColumn(Column::string('credential')->setComment('凭据：密码、微信授权码等'))
            ->addTimestamps()
            ->addSoftDelete()
            ->save();
    }
}
