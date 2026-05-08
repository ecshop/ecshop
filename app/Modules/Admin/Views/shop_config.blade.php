@include('pageheader')
<script src="../js/utils.js"></script>
<script src="../js/region.js"></script>
<div class="tab-div">
  <!-- tab bar -->
  <div id="tabbar-div">
    <p>
      @foreach($group_list as $group)<span class="@if($loop->iteration == 1)tab-front@elsetab-back@endif" id="{{ $group['code'] }}-tab">{{ $group['name'] }}</span>@endforeach
    </p>
  </div>
  <!-- tab body -->
  <div id="tabbody-div">
    <form enctype="multipart/form-data" name="theForm" action="?act=post" method="post">
    @foreach($group_list as $group)
    <table width="90%" id="{{ $group['code'] }}-table" @if($loop->iteration != 1)style="display:none"@endif>
      @foreach($group['vars'] as $key => $var)
      @include('shop_config_form')
      @endforeach
    </table>
    @endforeach

    <div class="button-div">
      <input name="submit" type="submit" value="{{ $lang['button_submit'] }}" class="button" />
      <input name="reset" type="reset" value="{{ $lang['button_reset'] }}" class="button" />
    </div>
    </form>
  </div>
</div>
<script src="tab.js"></script>
<script src="validator.js"></script>

<script language="JavaScript">
region.isAdmin = true;
onload = function()
{
    // 开始检查订单
    startCheckOrder();
}
var ReWriteSelected = null;
var ReWriteRadiobox = document.getElementsByName("value[209]");

for (var i=0; i<ReWriteRadiobox.length; i++)
{
  if (ReWriteRadiobox[i].checked)
  {
    ReWriteSelected = ReWriteRadiobox[i];
  }
}

function ReWriterConfirm(sender)
{
  if (sender == ReWriteSelected) return true;
  var res = true;
  if (sender != ReWriteRadiobox[0]) {
    var res = confirm('{$rewrite_confirm}');
  }

  if (res==false)
  {
      ReWriteSelected.checked = true;
  }
  else
  {
    ReWriteSelected = sender;
  }
  return res;
}
</script>

@include('pagefooter')