@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>
<div style="border: 1px solid #CC0000;background-color:#FFFFCE;color:#CE0000;padding:4px;" >{{ $lang['modify_notice'] }}</div>

<div class="form-div">
  <form action="javascript:searchUser()" name="searchForm">
  <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
  <select name="flag">
  @forelse($flags as $__k => $__v)<option value="{{ $__k }}" @if($__k == $default_flag) selected @endif>{{ $__v }}</option>@endforeach
  </select>
  <input type="submit" value="{{ $lang['button_search'] }}" class="button" />
  </form>
</div>

<form method="POST" action="integrate.php" name="listForm">
<!-- start users list -->
<div class="list-div" id="listDiv">
@endif
<!--用户列表部分-->
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>{{ $lang['user_name'] }}</th>
    <th>{{ $lang['email'] }}</th>
    <th>{{ $lang['reg_date'] }}</th>
    <th>{{ $lang['handler'] }}</th>
  <tr>
  @foreach($list as $user)
  <tr>
    <td>{{ $user['user_name'] }}</td>
    <td>{{ $user['email'] }}</td>
    <td align="center">{{ $user['reg_date'] }}</td>
    <td align="center">
    <input type="radio" name="opt[{{ $user['user_id'] }}]" value="2" @if($user['flag'] == 2)checked="checked"@endif />{{ $lang['short_rename'] }}&nbsp;<input type="text"  name="alias[{{ $user['user_id'] }}]" value="{{ $user['alias'] }}" size="16" />
    <input type="radio" name="opt[{{ $user['user_id'] }}]" value="3" @if($user['flag'] == 3)checked="checked"@endif />{{ $lang['short_delete'] }}
    <input type="radio" name="opt[{{ $user['user_id'] }}]" value="4" @if($user['flag'] == 4)checked="checked"@endif />{{ $lang['short_ignore'] }}
    </td>
  </tr>
  @empty
  <tr><td class="no-records" colspan="10">{{ $lang['no_records'] }}</td></tr>
  @endforelse
  <tr>
      <td colspan="3">
      </td>
      <td align="right" nowrap="true" colspan="8">
      @include('page')
      </td>
  </tr>
</table>

@if($full_page)
</div>
<!-- end users list -->
<div style="width:100%;text-align:center;padding:10px;">
<input type="hidden" name="act" value="act_modify" />
<input type="submit" value="{{ $lang['submit_modify'] }}"  class="button" />
<input type="button" value="{{ $lang['button_confirm_next'] }}" onclick="location.href='integrate.php?act=sync'" class="button" />
</div>
</form>
<script type="text/javascript" language="JavaScript">
<!--
listTable.recordCount = {{ $record_count }};
listTable.pageCount = {{ $page_count }};
var user_domain = "{{ $domain }}";

@foreach($filter as $key => $item)
listTable.filter.{{ $key }} = '{{ $item }}';
@endforeach


onload = function()
{
    // 开始检查订单
    startCheckOrder();
}

/**
 * 搜索用户
 */
function searchUser()
{
    listTable.filter['flag'] = document.forms['searchForm'].elements['flag'].value;
    listTable.filter['page'] = 1;
    listTable.loadList();
}
//-->
</script>

@include('pagefooter')
@endif