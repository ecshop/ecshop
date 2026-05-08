@include('pageheader')
<script src="../js/utils.js"></script>
<script src="listtable.js"></script>

<div class="list-div" id="listDiv">
  <form action="goods_batch.php?act=insert" method="post">
    <table cellspacing="1" cellpadding="3" width="100%">
      <tr>
        <th><input type="checkbox" checked onclick="listTable.selectAll(this, 'checked')" />{{ $lang['record_id'] }}</th>
        @foreach($title_list as $field => $title)
        @if($field_show.$field)<th>{{ $title }}</th>@endif
        @endforeach
        <th>{{ $lang['goods_class'] }}</th>
      </tr>
      @foreach($goods_list as $key => $goods)
      <tr>
        <td><input type="checkbox" name="checked[]" value="{{ $key }}" checked /> {{ $key }} </td>
        @foreach($goods as $field => $value)
          @if($field_show.$field)
          <td><input type="text" name="{{ $field }}[]" value="{{ $value }}" size="15" /></td>
          @else
          <input type="hidden" name="{{ $field }}[]" value="{{ $value }}" />
          @endif
        @endforeach
        <td><select name="goods_class[]">@foreach($goods_class as $__k => $__v)<option value="{{ $__k }}" @if($__k == $goods['is_real']) selected @endif>{{ $__v }}</option>@endforeach</select></td>
      </tr>
      @endforeach
      <tr align="center">
        <td colspan="7">
          <input type="hidden" name="cat" value="{{ request()->input('cat') }}" />
          <input type="submit" name="submit" value="{{ $lang['button_submit'] }}" class="button" />
          <input type="button" name="reset" onclick="history.go(-1)" value="{{ $lang['back'] }}" class="button" />
        </td>
      </tr>
    </table>
  </form>
</div>
@include('pagefooter')