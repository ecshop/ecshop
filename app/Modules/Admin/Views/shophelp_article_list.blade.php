@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>

<div class="form-div">
  {{ $lang['cat'] }}：{{ $cat }}
</div>
<!-- start article list -->
<div class="list-div" id="listDiv">
@endif

<table cellspacing='1' cellpadding='3' id='listTable'>
  <tr>
    <th>{{ $lang['title'] }}</th>
    <th>{{ $lang['article_type'] }}</th>
    <th>{{ $lang['add_time'] }}</th>
    <th>{{ $lang['handler'] }}</th>
  </tr>
  @foreach($list as $item)
    <tr>
      <td class="first-cell"><span onclick="javascript:listTable.edit(this,'edit_title', {{ $item['article_id'] }})">{{ $item['title'] }}</span></td>
      <td align="center">{ if $item.article_type eq 0}{{ $lang['common'] }}@else{{ $lang['top'] }}@endif</td>
      <td align="center">{{ $item['add_time'] }}</td>
      <td align ="center"><a href="shophelp.php?act=edit&id={{ $item['article_id'] }}" title="{{ $lang['edit'] }}"><img src="images/icon_edit.gif" border="0" height="16" width="16"></a>&nbsp;&nbsp;
      <a href="javascript:;" onclick="listTable.remove({{ $item['article_id'] }}, '{{ $lang['js_languages']['remove_confirm'] }}', 'remove_art')" title="{{ $lang['remove'] }}"><img src="images/icon_drop.gif" border="0" height="16" width="16"></a>
      </td>
    </tr>
  @endforeach
</table>

@if($full_page)
</div>

<script type="Text/Javascript" language="JavaScript">
  @foreach($filter as $key => $item)
  listTable.filter.{{ $key }} = '{{ $item }}';
  @endforeach

    
    onload = function()
    {
        // 开始检查订单
        startCheckOrder();
    }
    
</script>
@include('pagefooter')
@endif