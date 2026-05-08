@include('pageheader')
<script src="../js/utils.js"></script>
<script src="validator.js"></script>

@if($step == 1)
  <div class="infobox"><br/>
    <h4 class="marginbot normal">
       {{ $lang['filecheck_tips_step1'] }}
    </h4><br/>
    <p class="margintop">
        <input type="submit" onclick="location.href='filecheck.php?step=2'" value="{{ $lang['filecheck_start'] }}" name="submit" class="btn"/>
    </p>
  </div>
@endif

@if($step == 2)
  <div class="infobox"><br/>
    <h4 class="infotitle1">
      {{ $lang['filecheck_verifying'] }}
    </h4>
    <p class="margintop">
       <img src="./images/ajax_loader.gif" class="marginbot" />
    </p>
    <a class="lightlink" href="filecheck.php?step=3">{{ $lang['jump_info'] }}</a>
    <script type="text/JavaScript">setTimeout("window.location.replace('filecheck.php?step=3');", 2000);</script>
  </div>
@endif

@if($step == 3)
  <div class="main-div">
  <div style="padding:10px;font-weight:bold">{{ $lang['tips'] }}</div>
    <ul id="tipslis">
      {{ $lang['filecheck_tips'] }}
      </ul>
  </div>

  <div class="main-div">
  <table class="tb tb2" >
      <tr><th colspan="15">{{ $lang['filecheck_completed'] }}</th></tr>
      <tr><td colspan="4">
        <div class="lightfont filenum left">
          @foreach($result as $files => $nums)
           {{ $files }} ：{{ $nums }}&nbsp;&nbsp;&nbsp;
          @endforeach
        </div>
      </td></tr>

  @if($dirlog )
    <tr><th>{{ $lang['filename'] }}</th><th>{{ $lang['filesize'] }}</th><th>{{ $lang['filemtime'] }}</th><th>{{ $lang['filecheck_status'] }}</th></tr>
    @foreach($dirlog as $dir => $status)
        <tr><td colspan="4">
            <div class="left">
              <a class="ofolder" onclick="display('{{ $status['marker'] }}',this)" href="#dir">{{ $dir }}/</a>
            </div>
            @foreach($status as $type => $nums)
                @if($type == 'modify')
                    <div class="lightfont filenum left">{{ $lang['filecheck_modify'] }}: {{ $nums }}   </div>
                @endif
                @if($type == 'del')
                    <div class="lightfont filenum left">{{ $lang['filecheck_delete'] }}: {{ $nums }}   </div>
                @endif
                @if($type == 'add')
                    <div class="lightfont filenum left">{{ $lang['filecheck_unknown'] }}: {{ $nums }}   </div>
                @endif
            @endforeach
        </td></tr>
        <tbody id="{{ $status['marker'] }}">
           @foreach($filelist as $dirs => $files)
              @if($dirs == $dir)
                 @foreach($files as $file)
                    <tr><td>   <em class="bold files">{{ $file['file'] }}</em></td><td>{{ $file['size'] }}</td><td>{{ $file['filemtime'] }}</td><td>{{ $file['status'] }}</td></tr>
                 @endforeach
              @endif
          @endforeach
        </tbody>
    @endforeach
  @endif

  </table>
  </div>
@endif

<script language="JavaScript">
{literal}
onload = function()
{
  // 开始检查订单
  startCheckOrder();
}
function display(id,cls)
{
  var dir = document.getElementById(id);
  dir.style.display = (dir.style.display == 'none') ? '' : 'none';
  cls.className = (cls.className == 'ofolder') ? 'cfolder' : 'ofolder';
}
</script>
@include('pagefooter')