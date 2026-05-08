@include('pageheader')
<div class="main-div">
<form action="friend_link.php" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table width="100%" id="general-table">
  <tr>
    <td class="label"><a href="javascript:showNotice('LogoNameNotic');" title="{{ $lang['form_notice'] }}">
      <img src="images/notice.gif" width="16" height="16" border="0" alt="{{ $lang['form_notice'] }}"></a>{{ $lang['link_name'] }}</td>
    <td>
      <input type="text" name="link_name" value="{{ $link_arr['link_name'] }}" size="30"  />
      <br /><span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="LogoNameNotic">{{ $lang['link_name_desc'] }}</span>
    </td>
  </tr>
  <tr>
    <td class="label">{{ $lang['link_url'] }}</td>
    <td>
      <input type='text' name='link_url' value='{{ $link_arr['link_url'] }}' size="30"  />
    </td>
  </tr>
  <tr>
    <td class="label">{{ $lang['show_order'] }}</td>
    <td>
      <input type='text' name='show_order' @if($link_arr['show_order']) value="{{ $link_arr['show_order'] }}" @else value="50" @endif size="30"  />
    </td>
  </tr>
@if($action == "add")
  <tr>
    <td class="label">{{ $lang['link_logo'] }}</td>
    <td>
      <input type='file' name='link_img' size="35" />
    </td>
  </tr>
  <tr>
    <td class="label"><a href="javascript:showNotice('LogoUrlNotic');" title="{{ $lang['form_notice'] }}">
        <img src="images/notice.gif" width="16" height="16" border="0" alt="{{ $lang['form_notice'] }}"></a>{{ $lang['url_logo'] }}</td>
    <td>
      <input type='text' name='url_logo' size="42"  />
      <br /><span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="LogoUrlNotic">{{ $lang['url_logo_value'] }}</span>
    </td>
  </tr>
 @endif
 @if($action == "edit")
    <tr>
      <td class="label">{{ $lang['link_logo'] }}</td>
      <td>
        <input type='file' name='link_img' size="35" />
      </td>
    </tr>
    <tr>
      <td class="label"><a href="javascript:showNotice('LogoUrlNotic');" title="{{ $lang['form_notice'] }}">
        <img src="images/notice.gif" width="16" height="16" border="0" alt="{{ $lang['form_notice'] }}"></a>{{ $lang['url_logo'] }}</td>
      <td>
        <input type='text' name='url_logo' value="{{ $link_logo }}" size="42"  />
        <br /><span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="LogoUrlNotic">{{ $lang['url_logo_value'] }}</span>
      </td>
    </tr>
 @endif
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value="{{ $lang['button_submit'] }}" class="button" />
      <input type="reset" value="{{ $lang['button_reset'] }}" class="button" />
      <input type="hidden" name="act" value="{{ $form_act }}" />
      <input type="hidden" name="id" value="{{ $link_arr['link_id'] }}" />
      <input type="hidden" name="type" value="{{ $type }}" />
    </td>
  </tr>
</table>
</form>
</div>
<script src="../js/utils.js"></script>
<script src="validator.js"></script>
<script language="JavaScript">
<!--


/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("link_name",      link_name_empty);
    validator.required("link_url",       link_url_empty);
    validator.isNumber("show_order",     show_order_type);
    return validator.passed();
}

onload = function()
{
    // 开始检查订单
    startCheckOrder();
}

//-->
</script>
@include('pagefooter')