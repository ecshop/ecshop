Echo_Green '------------------------------'
Echo_Green ' 执行数据迁移'
Echo_Green '------------------------------'
php artisan migrate:run2

Echo_Green '------------------------------'
Echo_Green ' 执行数据填充'
Echo_Green '------------------------------'
php artisan seed:run2

Echo_Green '------------------------------'
Echo_Green ' 清理文件目录'
Echo_Green '------------------------------'
rm -rf app/entity/*.php
rm -rf app/model/*.php
rm -rf app/repository/*.php
rm -rf app/service/*.php
rm -rf app/service/{input,output}/*.php

Echo_Green '------------------------------'
Echo_Green ' 开始生成业务代码'
Echo_Green '------------------------------'
php artisan gen:entity
Echo_Green ' ...'
php artisan gen:model
Echo_Green ' ...'
php artisan gen:dao
Echo_Green ' ...'
php artisan gen:service

Echo_Green '------------------------------'
Echo_Green ' 生成业务代码结束'
Echo_Green '------------------------------'
