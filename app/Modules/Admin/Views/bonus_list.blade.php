@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>
<form method="POST" action="bonus.php?act=batch&bonus_type={{ request()->query('bonus_type') }}" name="listForm">
<!-- start user_bonus list -->
<div class="list-div" id="listDiv">
@endif

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>
        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox">
        <a href="javascript:listTable.sort('bonus_id'); ">{{ $lang['record_id'] }}</a>{{ $sort_bonus_id }}</th>
      @if($show_bonus_sn)
      <th><a href="javascript:listTable.sort('bonus_sn'); ">{{ $lang['bonus_sn'] }}</a>{{ $sort_bonus_sn }}</th>
      @endif
      <th><a href="javascript:listTable.sort('type_name'); ">{{ $lang['bonus_type'] }}</a>{{ $sort_type_name }}</th>
      <th><a href="javascript:listTable.sort('order_id'); ">{{ $lang['order_id'] }}</a>{{ $sort_order_id }}</th>
      <th><a href="javascript:listTable.sort('user_id'); ">{{ $lang['user_id'] }}</a>{{ $sort_user_id }}</th>
      <th><a href="javascript:listTable.sort('used_time'); ">{{ $lang['used_time'] }}</a>{{ $sort_use_time }}{{ $sort_used_time }}</th>
      @if($show_mail)
      <th><a href="javascript:listTable.sort('emailed'); ">{{ $lang['emailed'] }}</a>{{ $sort_emailed }}{{ $sort_emailed }}</th>
      @endif
      <th>{{ $lang['handler'] }}</th>
    </tr>
    @forelse($bonus_list as $bonus)
    <tr>
      <td><span><input value="{{ $bonus['bonus_id'] }}" name="checkboxes[]" type="checkbox">{{ $bonus['bonus_id'] }}</span></td>
      @if($show_bonus_sn)
      <td>{{ $bonus['bonus_sn'] }}</td>
      @endif
      <td>{{ $bonus['type_name'] }}</td>
      <td>{{ $bonus['order_sn'] }}</td>
      <td>@if($bonus['email'])<a href="mailto:{{ $bonus['email'] }}">{{ $bonus['user_name'] }}</a>@else{{ $bonus['user_name'] }}@endif</td>
      <td align="right">{{ $bonus['used_time'] }}</td>
      @if($show_mail)
      <td align="center">{{ $bonus['emailed'] }}</td>
      @endif
      <td align="center">
        <a href="javascript:;" onclick="listTable.remove({{ $bonus['bonus_id'] }}, '{{ $lang['drop_confirm'] }}', 'remove_bonus')">{{ $lang['remove'] }}</a>
        @if($show_mail && $bonus['order_id'] == 0 && $bonus['email'])<a href="bonus.php?act=send_mail&bonus_id={{ $bonus['bonus_id'] }}">{{ $lang['send_mail'] }}</a>@endif</td>
    </tr>
    @empty
    <tr><td class="no-records" colspan="11">{{ $lang['no_records'] }}</td></tr>
    @endforelse
  </table>

  <table cellpadding="4" cellspacing="0">
    <tr>
      <td><input type="submit" name="drop" id="btnSubmit" value="{{ $lang['drop'] }}" class="button" disabled="true" />
      @if($show_mail)<input type="submit" name="mail" id="btnSubmit1" value="{{ $lang['send_mail'] }}" class="button" disabled="true" />@endif</td>
      <td align="right">@include('page')</td>
    </tr>
  </table>

@if($full_page)
</div>
<!-- end user_bonus list -->
</form>

<script type="text/javascript" language="JavaScript">
  listTable.recordCount = {{ $record_count }};
  listTable.pageCount = {{ $page_count }};
  listTable.query = "query_bonus";

  @foreach($filter as $key => $item)
  listTable.filter.{{ $key }} = '{{ $item }}';
  @endforeach

  
  onload = function()
  {
    // 开始检查订单
    startCheckOrder();
    document.forms['listForm'].reset();
  }
  
</script>
@include('pagefooter')
@endif