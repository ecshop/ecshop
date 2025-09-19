<?php

use think\migration\Migrator;

class ChangeUserTable extends Migrator
{
    public function change(): void
    {
        $this->table('users')
            ->rename('user')
            ->save();

        $this->table('user')
            ->addTimestamps()
            ->addSoftDelete()
            ->save();
    }
}
