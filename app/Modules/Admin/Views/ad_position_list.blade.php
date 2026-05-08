@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>

<form method="post" action="" name="listForm">
<!-- start ad position list -->
<div class="list-div" id="listDiv">
@endif

<table cellpadding="3" cellspacing="1">
  <tr>
    <th>{{ $lang['position_name'] }}</th>
    <th>{{ $lang['posit_width'] }}</th>
    <th>{{ $lang['posit_height'] }}</th>
    <th>{{ $lang['position_desc'] }}</th>
    <th>{{ $lang['handler'] }}</th>
  </tr>
  @forelse($position_list as $list)
  <tr>
    <td class="first-cell">
    <span onclick="javascript:listTable.edit(this, 'edit_position_name', {{ $list['position_id'] }})">{{ $list['position_name'] }}</span>
    </td>
    <td align="right"><span onclick="javascript:listTable.edit(this, 'edit_ad_width', {{ $list['position_id'] }})">{{ $list['ad_width'] }}</span></td>
    <td align="right"><span onclick="javascript:listTable.edit(this, 'edit_ad_height', {{ $list['position_id'] }})">{{ $list['ad_height'] }}</span></td>
    <td align="left"><span>{{ $list['position_desc'] }}</span></td>
    <td align="center">
      <a href="ads.php?act=list&pid={{ $list['position_id'] }}" title="{{ $lang['view'] }}{{ $lang['ad_content'] }}">
      <img src="images/icon_view.gif" border="0" height="16" width="16" /></a>
      <a href="ad_position.php?act=edit&id={{ $list['position_id'] }}" title="{{ $lang['edit'] }}">
      <img src="images/icon_edit.gif" border="0" height="16" width="16" /></a>
      <a href="javascript:;" onclick="listTable.remove({{ $list['position_id'] }}, '{{ $lang['drop_confirm'] }}')" title="{{ $lang['remove'] }}"><img src="images/icon_drop.gif" border="0" height="16" width="16" /></a>
    </td>
  </tr>
  @empty
    <tr><td class="no-records" colspan="5">{{ $lang['no_position'] }}</td></tr>
  @endforelse
  <tr>
    <td align="right" nowrap="true" colspan="5">@include('page')</td>
  </tr>
</table>

@if($full_page)
</div>
<!-- end ad_position list -->
</form>

<script type="text/javascript" language="JavaScript">
  listTable.recordCount = {{ $record_count }};
  listTable.pageCount = {{ $page_count }};

  @foreach($filter as $key => $item)
  listTable.filter.{{ $key }} = '{{ $item }}';
  @endforeach
  
  onload = function()
  {
    // &#64138;&#53036;&#10870;鵥
    startCheckOrder();
  }
  
</script>
@include('pagefooter')
@endif
