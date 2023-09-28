Echo_Green '------------------------------'
Echo_Green ' 生成swagger接口文档'
Echo_Green '------------------------------'

vendor/bin/openapi $(Get_Bundles "Api") \
  -o public/swagger/api.json -f json

Echo_Green '------------------------------'
Echo_Green ' 生成typescript接口'
Echo_Green '------------------------------'

php artisan gen:interface
