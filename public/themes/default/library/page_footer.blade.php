<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--底部导航 start-->
<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="bNavList clearfix">
   <div class="f_l">
   @if($navigator_list['bottom'])
   @foreach($navigator_list['bottom'] as $nav)
        <a href="{{ $nav['url'] }}" @if($nav['opennew'] == 1) target="_blank" @endif>{{ $nav['name'] }}</a>
        @if(!$loop->last)
           -
        @endif
      @endforeach
  @endif
   </div>
   <div class="f_r">
   <a href="#top"><img src="images/bnt_top.gif" /></a> <a href="../index.php"><img src="images/bnt_home.gif" /></a>
   </div>
  </div>
 </div>
</div>
<!--底部导航 end-->
<div class="blank"></div>
<!--版权 start-->
<div id="footer">
 <div class="text">
 {{ $copyright }}<br />
 {{ $shop_address }} {{ $shop_postcode }}
 <!-- 客服电话@if($service_phone) -->
      Tel: {{ $service_phone }}
 <!-- 结束客服电话@endif -->
 <!-- 邮件@if($service_email) -->
      E-mail: {{ $service_email }}<br />
 <!-- 结束邮件@endif -->
 <!-- QQ 号码 @foreach($qq as $im) -->
      @if($im)
      <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin={{ $im }}&amp;Site={{ $shop_name }}&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:{{ $im }}:4" height="16" border="0" alt="QQ" /> {{ $im }}</a>
      @endif
      <!-- @endforeach 结束QQ号码 -->
      <!-- 淘宝旺旺 @foreach($ww as $im) -->
      @if($im)
      <a href="http://amos1.taobao.com/msg.ww?v=2&uid={{ $im }}&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid={{ $im }}&s=2" width="16" height="16" border="0" alt="淘宝旺旺" />{{ $im }}</a>
      @endif
      <!--@endforeach 结束淘宝旺旺 -->
      <!-- Yahoo Messenger @foreach($ym as $im) -->
      @if($im)
      <a href="http://edit.yahoo.com/config/send_webmesg?.target={{ $im }}n&.src=pg" target="_blank"><img src="../images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> {{ $im }}</a>
      @endif
      <!-- @endforeach 结束Yahoo Messenger -->
      <!-- MSN Messenger @foreach($msn as $im) -->
      @if($im)
      <img src="../images/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact={{ $im }}">{{ $im }}</a>
      @endif
      <!-- @endforeach 结束MSN Messenger -->
      <!-- Skype @foreach($skype as $im) -->
      @if($im)
      <img src="http://mystatus.skype.com/smallclassic/{{ $im }}" alt="Skype" /><a href="skype:{{ $im }}?call">{{ $im }}</a>
      @endif
  @endforeach<br />
  <!-- ICP 证书@if($icp_number) -->
  {{ $lang['icp_number'] }}:<a href="http://www.miibeian.gov.cn/" target="_blank">{{ $icp_number }}</a><br />
  <!-- 结束ICP 证书@endif -->
  {insert name='query_info'}<br />
  @foreach($lang['p_y'] as $pv){{ $pv }}@endforeach{{ $licensed }}<br />
    @if($stats_code)
    <div align="left">{{ $stats_code }}</div>
    @endif
    <div align="left"  id="rss"><a href="{{ $feed_url }}"><img src="../images/xml_rss2.gif" alt="rss" /></a></div>
 </div>
</div>

