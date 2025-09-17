Echo_Green '------------------------------'
Echo_Green ' 生成swagger接口文档'
Echo_Green '------------------------------'

vendor/bin/openapi app/auth -o public/docs/openapi/auth.json -f json
vendor/bin/openapi app/common -o public/docs/openapi/common.json -f json
vendor/bin/openapi app/shop -o public/docs/openapi/shop.json -f json
vendor/bin/openapi app/user -o public/docs/openapi/user.json -f json

Echo_Green '------------------------------'
Echo_Green ' 生成typescript接口'
Echo_Green '------------------------------'

php artisan gen:interface
