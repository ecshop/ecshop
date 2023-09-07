Echo_Green '------------------------------'
Echo_Green ' 生成swagger接口文档'
Echo_Green '------------------------------'

vendor/bin/openapi app/Http/Auth/ app/Entities/ \
  -o public/swagger/auth.json -f json

vendor/bin/openapi app/Http/Manager/ app/Entities/ \
  $(Get_Bundles "Manager") \
  -o public/swagger/manager.json -f json

vendor/bin/openapi app/Http/User/ app/Entities/ \
  $(Get_Bundles "User") \
  -o public/swagger/user.json -f json

vendor/bin/openapi app/Http/Portal/ app/Entities/ \
  $(Get_Bundles "Portal") \
  -o public/swagger/portal.json -f json

Echo_Green '------------------------------'
Echo_Green ' 生成typescript接口'
Echo_Green '------------------------------'

php artisan gen:interface
