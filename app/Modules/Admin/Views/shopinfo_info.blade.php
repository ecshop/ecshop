@include('pageheader')
<form method="post" action="shopinfo.php" name="theForm"  onsubmit="return validate()">
<div class="form-div">
{{ $lang['title'] }}&nbsp;:&nbsp;
<input type="text" name="title" size ="50" maxlength="60" value="{{ $article['title'] }}" />{{ $lang['require_field'] }}
</div>
<div class="main-div">
<table >
  <tr>
    <td  colspan ="2" align ="center" >
     {{ $FCKeditor }}</script>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br />
      <input type="submit" class="button" value="{{ $lang['button_submit'] }}" />
      <input type="reset" class="button" value="{{ $lang['button_reset'] }}" />
      <input type="hidden" name="act" value="{{ $form_action }}" />
      <input type="hidden" name="old_title" value="{{ $article['title'] }}" />
      <input type="hidden" name="id" value="{{ $article['article_id'] }}" />
    </td>
  </tr>
</table>
</div>
</form>
<script src="../js/utils.js"></script>
<script src="validator.js"></script>

<script language="JavaScript">
<!--
document.forms['theForm'].elements['title'].focus();

onload = function()
{
    // 开始检查订单
    startCheckOrder();
}

/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("title", no_title);
    return validator.passed();
}
//-->
</script>

@include('pagefooter')