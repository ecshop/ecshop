@include('pageheader')
<form method="POST" action="" name="theForm">
<div class="main-div">
<p style="padding: 0 10px">{{ $lang['sitemaps_note'] }}</p>
</div>
<div class="main-div">
<table width="100%">
<tr>
    <td class="label">{{ $lang['homepage_changefreq'] }}</td>
    <td><select name="homepage_priority">
  @foreach($arr_changefreq as $__i => $__v)<option value="{{ $__v }}" @if($__v == $config['homepage_priority']) selected @endif>{{ $arr_changefreq[$__i] }}</option>@endforeach
  </select><select name="homepage_changefreq">
  @foreach($lang['priority'] as $__k => $__v)<option value="{{ $__k }}" @if($__k == $config['homepage_changefreq']) selected @endif>{{ $__v }}</option>@endforeach
  </select></td>
</tr>
<tr>
    <td class="label">{{ $lang['category_changefreq'] }}</td>
    <td><select name="category_priority">
  @foreach($arr_changefreq as $__i => $__v)<option value="{{ $__v }}" @if($__v == $config['category_priority']) selected @endif>{{ $arr_changefreq[$__i] }}</option>@endforeach
  </select><select name="category_changefreq">
  @foreach($lang['priority'] as $__k => $__v)<option value="{{ $__k }}" @if($__k == $config['category_changefreq']) selected @endif>{{ $__v }}</option>@endforeach
  </select></td>
</tr>
<tr>
    <td class="label">{{ $lang['content_changefreq'] }}</td>
    <td><select name="content_priority">
  @foreach($arr_changefreq as $__i => $__v)<option value="{{ $__v }}" @if($__v == $config['content_priority']) selected @endif>{{ $arr_changefreq[$__i] }}</option>@endforeach
  </select><select name="content_changefreq">
  @foreach($lang['priority'] as $__k => $__v)<option value="{{ $__k }}" @if($__k == $config['content_changefreq']) selected @endif>{{ $__v }}</option>@endforeach
  </select></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="{{ $lang['button_submit'] }}" class="button" /><input type="reset" value="{{ $lang['button_reset'] }}" class="button" /></td>
</tr>
</table>
</div>
</form>

<script type="text/javascript" language="JavaScript">
<!--
onload = function()
{
    document.forms['theForm'].elements['homepage_changefreq'].focus();
    // 开始检查订单
    startCheckOrder();
}
//-->
</script>

@include('pagefooter')