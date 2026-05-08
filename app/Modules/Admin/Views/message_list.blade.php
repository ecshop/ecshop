@if($full_page)
@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>

<div class="form-div">
  <form method="post" action="javascript:searchMessage()" name="theForm">
  {{ $lang['select_msg_type'] }}:
  <select name="msg_type" onchange="javascript:searchMessage()">
    @forelse($lang['message_type'] as $__k => $__v)<option value="{{ $__k }}" @if($__k == $msg_type) selected @endif>{{ $__v }}</option>@endforeach
  </select>
  <input type="submit" value="{{ $lang['button_submit'] }}" class="button" />
  </form>
</div>

<!-- start admin_message list -->
<form method="POST" action="message.php?act=drop_msg" name="listForm">
<div class="list-div" id="listDiv">
@endif

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>
        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
        <a href="javascript:listTable.sort('message_id'); ">{{ $lang['record_id'] }}</a>{{ $sort_message_id }}
      </th>
      <th><a href="javascript:listTable.sort('title'); ">{{ $lang['title'] }}</a>{{ $sort_title }}</th>
      <th><a href="javascript:listTable.sort('sender_id'); ">{{ $lang['sender_id'] }}</a>{{ $sort_sender_id }}</th>
      <th><a href="javascript:listTable.sort('sent_time'); ">{{ $lang['send_date'] }}</a>{{ $sort_send_date }}</th>
      <th><a href="javascript:listTable.sort('read_time'); ">{{ $lang['read_date'] }}</a>{{ $sort_read_date }}</th>
      <th>{{ $lang['handler'] }}</th>
    </tr>
    @foreach($message_list as $msg)
    <tr>
      <td><input type="checkbox" name="checkboxes[]" value="{{ $msg['message_id'] }}" />{{ $msg['message_id'] }}</td>
      <td class="first-cell">{{ \Illuminate\Support\Str::limit($msg['title'], 35, '...') }}</td>
      <td>{{ $msg['user_name'] }}</td>
      <td align="right">{{ $msg['sent_time'] }}</td>
      <td align="right">{{ $msg['read_time'] ?? N/A }}</td>
      <td align="center">
        <a href="message.php?act=view&id={{ $msg['message_id'] }}" title="{{ $lang['view_msg'] }}">{{ $lang['view'] }}</a>
         <a href="javascript:;" onclick="listTable.remove({{ $msg['message_id'] }}, '{{ $lang['drop_confirm'] }}')">{{ $lang['remove'] }}</a>
      </td>
    </tr>
    @empty
    <tr><td class="no-records" colspan="10">{{ $lang['no_records'] }}</td></tr>
    @endforelse
  </table>

  <table cellpadding="4" cellspacing="0">
    <tr>
      <td><input type="submit" name="drop" id="btnSubmit" value="{{ $lang['drop'] }}" class="button" disabled="true" /></td>
      <td align="right">@include('page')</td>
    </tr>
  </table>

@if($full_page)
</div>
</form>
<script type="text/javascript" language="JavaScript">
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

  /**
   * 查询留言
   */
  function searchMessage()
  {
    listTable.filter.msg_type = document.forms['theForm'].elements['msg_type'].value;
    listTable.filter.page = 1;
    listTable.loadList();
  }
  
//-->
</script>

@include('pagefooter')
@endif