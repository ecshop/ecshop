<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lang['cp_home'] }}@if($ur_here) - {{ $ur_here }}@endif</title>
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body {
  color: white;
}
</style>

<script src="../js/utils.js"></script>
<script src="validator.js"></script>
<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
@foreach($lang['js_languages'] as $key => $item)
var {{ $key }} = "{{ $item }}";
@endforeach

if (window.parent != window)
{
  window.top.location.href = location.href;
}

//-->
</script>
</head>
<body style="background: #278296">
<form method="post" action="privilege.php" name='theForm' onsubmit="return validate()">
  <table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
  <tr>
    <td><img src="images/login.png" width="178" height="256" border="0" alt="ECSHOP" /></td>
    <td style="padding-left: 50px">
      <table>
      <tr>
        <td>{{ $lang['label_username'] }}</td>
        <td><input type="text" name="username" /></td>
      </tr>
      <tr>
        <td>{{ $lang['label_password'] }}</td>
        <td><input type="password" name="password" /></td>
      </tr>
      @if($gd_version > 0)
      <tr>
        <td>{{ $lang['label_captcha'] }}</td>
        <td><input type="text" name="captcha" class="capital" /></td>
      </tr>
      <tr>
      <td colspan="2" align="right"><img src="index.php?act=captcha&{{ $random }}" width="145" height="20" alt="CAPTCHA" border="1" onclick= this.src="index.php?act=captcha&"+Math.random() style="cursor: pointer;" title="{{ $lang['click_for_another'] }}" />
      </td>
      </tr>
      @endif
      <tr><td colspan="2"><input type="checkbox" value="1" name="remember" id="remember" /><label for="remember">{{ $lang['remember'] }}</label></td></tr>
      <tr><td>&nbsp;</td><td><input type="submit" value="{{ $lang['signin_now'] }}" class="button" /></td></tr>
      <tr>
        <td colspan="2" align="right">&raquo; <a href="../" style="color:white">{{ $lang['back_home'] }}</a> &raquo; <a href="get_password.php?act=forget_pwd" style="color:white">{{ $lang['forget_pwd'] }}</a></td>
      </tr>
      </table>
    </td>
  </tr>
  </table>
  <input type="hidden" name="act" value="signin" />
</form>
<script language="JavaScript">
<!--
  document.forms['theForm'].elements['username'].focus();
  
  /**
   * 检查表单输入的内容
   */
  function validate()
  {
    var validator = new Validator('theForm');
    validator.required('username', user_name_empty);
    //validator.required('password', password_empty);
    if (document.forms['theForm'].elements['captcha'])
    {
      validator.required('captcha', captcha_empty);
    }
    return validator.passed();
  }
  
//-->
</script>
</body>