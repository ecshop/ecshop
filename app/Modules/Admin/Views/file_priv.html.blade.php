@include('pageheader')
<script src="validator.js"></script>
<!-- start shipping area list -->
<div class="list-div" id="listDiv">

<table cellspacing='1' cellpadding='3' id='list-table'>
  <tr>
    <th>{{ $lang['item'] }}</th>
    <th>{{ $lang['read'] }}</th>
    <th>{{ $lang['write'] }}</th>
    <th>{{ $lang['modify'] }}</th>
  </tr>
  @foreach($list as $key => $item)
  <tr>
    <td width="250px">{{ $item['item'] }}</td>
    <td>@if($item['r'] > 0)<img src="images/yes.gif" width="14" height="14" alt="YES" />@else<img src="images/no.gif" width="14" height="14" alt="NO" />@if($item['err_msg']['w'])&nbsp;<a href="javascript:showNotice('r_{{ $key }}');" title="{{ $lang['detail'] }}">[{{ $lang['detail'] }}]</a><br /><span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="r_{{ $key }}">@foreach($item['err_msg']['r'] as $msg){{ $msg }}{{ $lang['unread'] }}<br />@endforeach</span>@endif@endif</td>
    <td>@if($item['w'] > 0)<img src="images/yes.gif" width="14" height="14" alt="YES" />@else<img src="images/no.gif" width="14" height="14" alt="NO" />@if($item['err_msg']['w'])&nbsp;<a href="javascript:showNotice('w_{{ $key }}');" title="{{ $lang['detail'] }}">[{{ $lang['detail'] }}]</a><br /><span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="w_{{ $key }}">@foreach($item['err_msg']['w'] as $msg){{ $msg }}{{ $lang['unwrite'] }}<br />@endforeach</span>@endif@endif</td>
    <td>@if($item['m'] > 0)<img src="images/yes.gif" width="14" height="14" alt="YES" />@else<img src="images/no.gif" width="14" height="14" alt="NO" />@if($item['err_msg']['m'])&nbsp;<a href="javascript:showNotice('m_{{ $key }}');" title="{{ $lang['detail'] }}">[{{ $lang['detail'] }}]</a><br /><span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="m_{{ $key }}">@foreach($item['err_msg']['m'] as $msg){{ $msg }}{{ $lang['unmodify'] }}<br />@endforeach</span>@endif@endif</td>
  </tr>
  @endforeach
  @if($tpl_msg)
  <tr>
    <td colspan="4"><img src="images/no.gif" width="14" height="14" alt="NO" /><span style="color:red">{{ $tpl_msg }}</span>{{ $lang['unrename'] }}</td>
  </tr>
  @endif
</table>

</div>


<script language="JavaScript">
<!--
onload = function()
{
    // 开始检查订单
    startCheckOrder();
}
//-->
</script>


@include('pagefooter')
