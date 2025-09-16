<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateSystemRoleMenuTable extends Migrator
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
        $table = $this->table('system_role_menu')->setComment('系统角色菜单关联表');
        $table
            ->addColumn(Column::integer('system_role_id')->setUnsigned()->setComment('系统角色ID'))
            ->addColumn(Column::integer('system_menu_id')->setUnsigned()->setComment('系统菜单ID'))
            ->addTimestamps()
            ->save();
    }
}
