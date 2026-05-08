<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="{{ $keywords }}" />
<meta name="Description" content="{{ $description }}" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>{{ $page_title }}</title>
<!-- TemplateEndEditable --><!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable -->
<link rel="shortcut icon" href="favicon.ico" />
<link href="{{ $ecs_css_path }}" rel="stylesheet" type="text/css" />
{* 包含脚本文件 *}
<script src="common.js"></script>
</head>
<body>
<!-- #BeginLibraryItem "/library/page_header.lbi" --><!-- #EndLibraryItem -->
<!--当前位置 start-->
<div class="block box">
 <div id="ur_here">
  <!-- #BeginLibraryItem "/library/ur_here.lbi" --><!-- #EndLibraryItem -->
 </div>
</div>
<!--当前位置 end-->
<div class="blank"></div>
<div class="block clearfix">
  <!--left start-->
  <div class="AreaL">
    <!-- TemplateBeginEditable name="左边区域" -->
    <!-- #BeginLibraryItem "/library/cart.lbi" --><!-- #EndLibraryItem -->
    <!-- #BeginLibraryItem "/library/category_tree.lbi" --><!-- #EndLibraryItem -->
    <!-- #BeginLibraryItem "/library/goods_related.lbi" --><!-- #EndLibraryItem -->
    <!-- #BeginLibraryItem "/library/goods_fittings.lbi" --><!-- #EndLibraryItem -->
    <!-- #BeginLibraryItem "/library/goods_article.lbi" --><!-- #EndLibraryItem -->
    <!-- #BeginLibraryItem "/library/goods_attrlinked.lbi" --><!-- #EndLibraryItem -->
    <!-- TemplateEndEditable -->
    <div id="ECS_PRICE_LIST">
    <!-- #BeginLibraryItem "/Library/snatch_price.lbi" --><!-- #EndLibraryItem -->
    </div>
    <div class="box">
     <div class="box_1">
      <h3><span>{{ $lang['activity_list'] }}</span></h3>
      <div class="boxCenterList RelaArticle">
        <ul class="clearfix">
        @foreach($snatch_list as $item)
        <li><a href="{{ $item['url'] }}">{{ $item['snatch_name'] }}</a>&nbsp;&nbsp;
          @if($item['overtime'] )
          ({{ $lang['end'] }})
          @endif
        </li>
        @endforeach
        </ul>
      </div>
     </div>
    </div>
    <div class="blank5"></div>
    <!-- TemplateBeginEditable name="左边广告区域（宽200px）" -->
    <!-- TemplateEndEditable -->
    <!--AD end-->
    <!-- #BeginLibraryItem "/library/history.lbi" --><!-- #EndLibraryItem -->
  </div>
  <!--left end-->
  <!--right start-->
  <div class="AreaR">
   <div class="box">
   <div class="box_1">
    <h3><span>{{ $lang['treasure_info'] }}</span></h3>
    <div class="boxCenterList">
      <ul class="group clearfix">
      <li style="margin-right:8px; text-align:center;">
      <a href="{{ $snatch_goods['url'] }}"><img src="{{ $snatch_goods['goods_thumb'] }}" alt="{{ $snatch_goods['goods_name'] }}" /></a>
      </li>
      <li style="width:555px; line-height:23px;">
       <script src="lefttime.js"></script>
     <a href="{{ $snatch_goods['url'] }}"><strong>{{ $snatch_goods['goods_name'] }}</strong>@if($snatch_goods['product_id'] > 0)&nbsp;[{{ $products_info }}]@endif</a><br />
     {{ $lang['shop_price'] }} <font class="shop">{{ $snatch_goods['formated_shop_price'] }}</font><br />
     {{ $lang['market_price'] }} <font class="market">{{ $snatch_goods['formated_market_price'] }}</font> <br />
     {{ $lang['residual_time'] }} <font color="red"><span id="leftTime">{{ $lang['please_waiting'] }}</span></font><br />
     {{ $lang['activity_desc'] }}：<br />{!! nl2br(e($snatch_goods['desc'])) !!}
      </li>
      </ul>
    </div>
   </div>
  </div>
   <div class="blank5"></div>
   <div class="box">
   <div class="box_1">
    <h3><span>{{ $lang['activity_intro'] }}</span></h3>
    <div class="boxCenterList">
    {{ $snatch_goods['snatch_time'] }}<br />
    {{ $lang['price_extent'] }}{{ $snatch_goods['formated_start_price'] }} - {{ $snatch_goods['formated_end_price'] }} <br />
    {{ $lang['user_to_use_up'] }}{{ $snatch_goods['cost_points'] }} {{ $points_name }}<br />
    {{ $lang['snatch_victory_desc'] }}<br />
    @if($snatch_goods['max_price'] != 0)    {{ $lang['price_less_victory'] }}{{ $snatch_goods['formated_max_price'] }}，{{ $lang['price_than_victory'] }}{{ $snatch_goods['formated_max_price'] }}，{{ $lang['or_can'] }}{{ $snatch_goods['formated_max_price'] }}{{ $lang['shopping_product'] }}。
    @else
    {{ $lang['victory_price_product'] }}
    @endif
    </div>
   </div>
  </div>
  <div class="blank5"></div>
  <div id="ECS_SNATCH">
    <!-- #BeginLibraryItem "/Library/snatch.lbi" --><!-- #EndLibraryItem -->
    </div>
  </div>
  <!--right end-->
</div>
<div class="blank5"></div>
<!--帮助-->
<div class="block">
  <div class="box">
   <div class="helpTitBg clearfix">
    <!-- #BeginLibraryItem "/library/help.lbi" --><!-- #EndLibraryItem -->
   </div>
  </div>
</div>
<div class="blank"></div>
<!--帮助-->
<!--友情链接 start-->
@if($img_links  || $txt_links )
<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="links clearfix">
    <!--开始图片类型的友情链接@foreach($img_links as $link)-->
    <a href="{{ $link['url'] }}" target="_blank" title="{{ $link['name'] }}"><img src="{{ $link['logo'] }}" alt="{{ $link['name'] }}" border="0" /></a>
    <!--结束图片类型的友情链接@endforeach-->
    @if($txt_links)
    <!--开始文字类型的友情链接@foreach($txt_links as $link)-->
    [<a href="{{ $link['url'] }}" target="_blank" title="{{ $link['name'] }}">{{ $link['name'] }}</a>]
    <!--结束文字类型的友情链接@endforeach-->
    @endif
  </div>
 </div>
</div>
@endif
<!--友情链接 end-->
<div class="blank"></div>
<!-- #BeginLibraryItem "/library/page_footer.lbi" --><!-- #EndLibraryItem -->
</body>
<script type="text/javascript">
var gmt_end_time = {{ $snatch_goods['gmt_end_time'] ?? 0 }};
var id = {{ $id }};
@foreach($lang['snatch_js'] as $key => $item)
var {{ $key }} = "{{ $item }}";
@endforeach
@foreach($lang['goods_js'] as $key => $item)
var {{ $key }} = "{{ $item }}";
@endforeach
<!--  -->

onload = function()
{
  try
  {
    window.setInterval("newPrice(" + id + ")", 8000);
    onload_leftTime();
  }
  catch (e)
  {}
}
<!--  -->
</script>
</html>
