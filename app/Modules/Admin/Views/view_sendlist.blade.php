@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>

<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
@endif
<table cellspacing='1' cellpadding='3'>
<tr>
  <th>
    <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox">
    {{ $lang['record_id'] }}
  </th>
  <th><a href="javascript:listTable.sort('template_subject'); ">{{ $lang['email_subject'] }}</a>{{ $sort_template_subject }}</th>
  <th><a href="javascript:listTable.sort('email'); ">{{ $lang['email_val'] }}</a>{{ $sort_email }}</th>
  <th width="8%"><a href="javascript:listTable.sort('pri'); ">{{ $lang['pri']['name'] }}</a>{{ $sort_pri }}</th>
  <th width="8%">{{ $lang['type']['name'] }}</th>
  <th width="8%"><a href="javascript:listTable.sort('error'); ">{{ $lang['email_error'] }}</a>{{ $sort_error }}</th>
  <th width="20%"><a href="javascript:listTable.sort('last_send'); ">{{ $lang['last_send'] }}</a>{{ $sort_last_send }}</th>
  <th width="5%">{{ $lang['handler'] }}</th>
</tr>
@forelse($listdb as $val)
<tr>
  <td><input type="checkbox" name="checkboxes[]" value="{{ $val['id'] }}" />{{ $val['id'] }}</td>
  <td>{{ $val['template_subject'] }}</td>
  <td>{{ $val['email'] }}</td>
  <td align="center">{{ $lang['pri[$val']['pri]'] }}</td>
  <td align="center">{{ $lang['type[$val']['type]'] }}</td>
  <td align="center">{{ $val['error'] }}</td>
  <td align="center">{{ $val['last_send'] }}</td>
  <td align="center"><a href="view_sendlist.php?act=del&id={{ $val['id'] }}" onclick="return confirm('{{ $lang['ckdelete'] }}');">{{ $lang['delete'] }}</a></td>
</tr>
@empty
  <tr><td class="no-records" colspan="10">{{ $lang['no_records'] }}</td></tr>
@endforelse
</table>
<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tr>
    <td>
    <input type="hidden" name="act" value=""/>
    <input type="button" id="btnSubmit1" value="{{ $lang['button_remove'] }}" disabled="true" class="button" onclick="subFunction('batch_remove')"/>
    <input type="button" id="btnSubmit2" value="{{ $lang['batch_send'] }}" disabled="true" class="button" onclick="subFunction('batch_send')"/>
    <input type="button" value="{{ $lang['all_send'] }}" class="button" onclick="subFunction('all_send')"/>
    </td>
    <td align="right" nowrap="true">
    @include('page')
    </td>
  </tr>
</table>
<script type="text/javascript" language="JavaScript">
function subFunction(act)
{
  var frm = document.forms['listForm'];
  frm.elements['act'].value = act;
  frm.submit();
}
</script>
@if($full_page)
</div>
</form>

<script type="text/javascript" language="JavaScript">
listTable.recordCount = {{ $record_count }};
listTable.pageCount = {{ $page_count }};
@foreach($filter as $key => $item)
listTable.filter.{{ $key }} = '{{ $item }}';
@endforeach
</script>


@include('pagefooter')
@endif