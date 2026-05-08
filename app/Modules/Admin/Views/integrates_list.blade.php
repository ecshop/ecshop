@include('pageheader')
<!-- start integrate plugins list -->
<div class="form-div">
  {{ $lang['user_help'] }}
</div>
<div class="list-div" id="listDiv">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th>{{ $lang['integrate_name'] }}</th>
    <th>{{ $lang['integrate_version'] }}</th>
    <th>{{ $lang['integrate_author'] }}</th>
    <th>{{ $lang['handler'] }}</th>
  </tr>
  @foreach($modules as $module)
  <tr>
    <td class="first-cell">{{ $module['name'] }}</td>
    <td>{{ $module['version'] }}</td>
    <td><a href="{{ $module['website'] }}">{{ $module['author'] }}</a></td>
    <td align="center">
      @if($module['installed'] == 1)
      <a href="integrate.php?act=setup&code={{ $module['code'] }}">{{ $lang['setup'] }}</a>@if($allow_set_points)&nbsp;<a href="integrate.php?act=points_set&code={{ $module['code'] }}">{{ $lang['points_set'] }}</a>@endif
      @else
      <a @if($module['code'] != "ecshop")href="javascript:confirm_redirect('{{ $lang['install_confirm'] }}', 'integrate.php?act=install&code={{ $module['code'] }}')"@elsehref="integrate.php?act=install&code={{ $module['code'] }}" @endif>{{ $lang['install'] }}</a>
      @endif
    </td>
  </tr>
  @endforeach
</table>
</div>
<!-- end integrate plugins list -->

<script type="Text/Javascript" language="JavaScript">
<!--
onload = function()
{
  // 开始检查订单
  startCheckOrder();
}
//-->
</script>

@include('pagefooter')