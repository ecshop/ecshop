<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ __('cp_home') }}@if(isset($ur_here)) - {{ $ur_here }}@endif</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('static/layui/css/layui.css') }}" media="all">
    <style>
        body {
            background-color: #278296;
        }
        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            background: #ffffff;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-logo {
            margin-bottom: 15px;
        }
        .login-footer {
            text-align: right;
            margin-top: 20px;
        }
        .captcha-img {
            cursor: pointer;
            height: 38px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-form">
        <div class="login-header">
            <div class="login-logo">
                <img src="/images/login.png" width="178" height="256" alt="ECSHOP">
            </div>
            <h2>管理员登录</h2>
        </div>
        
        <form class="layui-form" method="post" action="privilege.php" name="theForm">
            @csrf
            <input type="hidden" name="act" value="signin">
            
            <div class="layui-form-item">
                <label class="layui-form-label">{{ __('label_username') }}</label>
                <div class="layui-input-block">
                    <input type="text" name="username" required lay-verify="required" placeholder="{{ __('label_username') }}" autocomplete="off" class="layui-input">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">{{ __('label_password') }}</label>
                <div class="layui-input-block">
                    <input type="password" name="password" required lay-verify="required" placeholder="{{ __('label_password') }}" autocomplete="off" class="layui-input">
                </div>
            </div>
            
            @if(isset($gd_version) && $gd_version > 0)
            <div class="layui-form-item">
                <label class="layui-form-label">{{ __('label_captcha') }}</label>
                <div class="layui-input-inline">
                    <input type="text" name="captcha" required lay-verify="required" placeholder="{{ __('label_captcha') }}" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <img class="captcha-img" src="index.php?act=captcha&{{ time() }}" onclick="this.src='index.php?act=captcha&'+Math.random()" title="{{ __('click_for_another') }}" alt="CAPTCHA">
                </div>
            </div>
            @endif
            
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="checkbox" name="remember" lay-skin="primary" title="{{ __('remember') }}">
                </div>
            </div>
            
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="login">登录</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
            
            <div class="login-footer">
                <a href="../" class="layui-text">« {{ __('back_home') }}</a> |
                <a href="get_password.php?act=forget_pwd" class="layui-text">{{ __('forget_pwd') }}</a>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('static/layui/layui.js') }}" charset="utf-8"></script>
<script>
    // 如果窗口在iframe中，则跳转到顶层窗口
    if (window.parent !== window) {
        window.top.location.href = location.href;
    }

    layui.use(['form'], function(){
        var form = layui.form;

        // 表单验证
        form.verify({
            username: function(value) {
                if (!value) {
                    return '{{ __("js_languages.user_name_empty") ?? "用户名不能为空" }}';
                }
            },
            captcha: function(value) {
                if (!value) {
                    return '{{ __("js_languages.captcha_empty") ?? "验证码不能为空" }}';
                }
            }
        });
        
        // 设置焦点到用户名字段
        document.forms['theForm'].elements['username'].focus();
    });
</script>
</body>
</html>