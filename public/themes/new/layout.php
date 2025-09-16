<?php function_exists('theme') or exit;?>

<!DOCTYPE html>
<html lang="zh-Hans">
<head>
<meta charset="utf-8">
{:token_meta()}
<title>welcome</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{:asset('static/layui/css/layui.css')}"/>
<link rel="stylesheet" href="{:theme('css/style.css')}"/>
<script src="{:asset('static/layui/layui.js')}"></script>
<script src="{:asset('static/vue/vue.min.js')}"></script>
<script src="{:asset('static/js/common.js')}"></script>
</head>
<body>
{include file="header" /}
{__CONTENT__}
{include file="footer" /}
</body>
</html>
