@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>

<form method="post" action="" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
<div class="list-div" id="listDiv">
@endif

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th> <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
          <a href="javascript:listTable.sort('suppliers_id'); ">{{ $lang['record_id'] }}</a>{{ $sort_suppliers_id }} </th>
      <th><a href="javascript:listTable.sort('suppliers_name'); ">{{ $lang['suppliers_name'] }}</a>{{ $sort_suppliers_name }}</th>
      <th>{{ $lang['suppliers_desc'] }}</th>
      <th>{{ $lang['suppliers_check'] }}</th>
      <th>{{ $lang['handler'] }}</th>
    </tr>
    @forelse($suppliers_list as $suppliers)
    <tr>
      <td><input type="checkbox" name="checkboxes[]" value="{{ $suppliers['suppliers_id'] }}" />
        {{ $suppliers['suppliers_id'] }}</td>
      <td class="first-cell">
        <span onclick="javascript:listTable.edit(this, 'edit_suppliers_name', {{ $suppliers['suppliers_id'] }})">{{ $suppliers['suppliers_name'] }}      </span></td>
      <td>{!! nl2br(e($suppliers['suppliers_desc'])) !!}</td>
			<td align="center"><img src="images/@if($suppliers['is_check'] == 1)yes@elseno@endif.gif" onclick="listTable.toggle(this, 'is_check', {{ $suppliers['suppliers_id'] }})" style="cursor:pointer;"/></td>
      <td align="center">
        <a href="suppliers.php?act=edit&id={{ $suppliers['suppliers_id'] }}" title="{{ $lang['edit'] }}">{{ $lang['edit'] }}</a> |
        <a href="javascript:void(0);" onclick="listTable.remove({{ $suppliers['suppliers_id'] }}, '{{ $lang['drop_confirm'] }}')" title="{{ $lang['remove'] }}">{{ $lang['remove'] }}</a>      </td>
    </tr>
    @empty
    <tr><td class="no-records" colspan="4">{{ $lang['no_records'] }}</td></tr>
    @endforelse
  </table>
<table id="page-table" cellspacing="0">
  <tr>
    <td>
      <input name="remove" type="submit" id="btnSubmit" value="{{ $lang['drop'] }}" class="button" disabled="true" />
      <input name="act" type="hidden" value="batch" />
    </td>
    <td align="right" nowrap="true">
    @include('page')
    </td>
  </tr>
</table>

@if($full_page)
</div>
</form>

<script type="text/javascript" language="javascript">
  <!--
  listTable.recordCount = {{ $record_count }};
  listTable.pageCount = {{ $page_count }};

  @foreach($filter as $key => $item)
  listTable.filter.{{ $key }} = '{{ $item }}';
  @endforeach

  
  onload = function()
  {
      // 开始检查订单
      startCheckOrder();
  }
  
  //-->
</script>
@include('pagefooter')
@endif