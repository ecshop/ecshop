<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="{$keywords}" />
<meta name="Description" content="{$description}" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>{$page_title}</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="shortcut icon" href="favicon.ico" />
<link href="{$ecs_css_path}" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|{$page_title}" href="{$feed_url}" />
{* 包含脚本文件 *}
{insert_scripts files='common.js,index.js'}
</head>
<body>
<!-- #BeginLibraryItem "/library/page_header.lbi" --><!-- #EndLibraryItem -->
<div class="blank"></div>
<div class="block clearfix">
  <!--left start-->
  <div class="AreaL">
    <!--站内公告 start-->
    <div class="box">
     <div class="box_1">
      <h3><span>{$lang.shop_notice}</span></h3>
      <div class="boxCenterList RelaArticle">
        {$shop_notice}
      </div>
     </div>
    </div>
    <div class="blank5"></div>
    <!--站内公告 end-->
  <!-- TemplateBeginEditable name="左边区域" -->
<!-- #BeginLibraryItem "/library/cart.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/category_tree.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/top10.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/promotion_info.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/order_query.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/invoice_query.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/vote_list.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/email_list.lbi" --><!-- #EndLibraryItem -->
<!-- TemplateEndEditable -->

  </div>
  <!--left end-->
  <!--right start-->
  <div class="AreaR">
   <!--焦点图和站内快讯 START-->
    <div class="box clearfix">
     <div class="box_1 clearfix">
       <div class="f_l" id="focus">
       <!-- #BeginLibraryItem "/library/index_ad.lbi" --><!-- #EndLibraryItem -->
       </div>
       <!--news-->
       <div id="mallNews" class="f_r">
        <div class="NewsTit"></div>
        <div class="NewsList tc">
         <!-- TemplateBeginEditable name="站内快讯上广告位（宽：210px）" -->
<!-- TemplateEndEditable -->
        <!-- #BeginLibraryItem "/library/new_articles.lbi" --><!-- #EndLibraryItem -->
        </div>
       </div>
       <!--news end-->
     </div>
    </div>
    <div class="blank5"></div>
   <!--焦点图和站内快讯 END-->
   <!--今日特价，品牌 start-->
    <div class="clearfix">
      <!--特价-->
      <!-- #BeginLibraryItem "/library/recommend_promotion.lbi" --><!-- #EndLibraryItem -->
      <!--品牌-->
      <div class="box f_r brandsIe6">
       <div class="box_1 clearfix" id="brands">
        <!-- #BeginLibraryItem "/library/brands.lbi" --><!-- #EndLibraryItem -->
       </div>
      </div>
    </div>
    <div class="blank5"></div>
   <!-- TemplateBeginEditable name="右边主区域" -->
<!-- #BeginLibraryItem "/library/recommend_best.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/recommend_new.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/recommend_hot.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/auction.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/group_buy.lbi" --><!-- #EndLibraryItem -->
<!-- TemplateEndEditable -->
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
<!--{if $img_links  or $txt_links }-->
<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="links clearfix">
    <!--开始图片类型的友情链接{foreach from=$img_links item=link}-->
    <a href="{$link.url}" target="_blank" title="{$link.name}"><img src="{$link.logo}" alt="{$link.name}" border="0" /></a>
    <!--结束图片类型的友情链接{/foreach}-->
    <!-- {if $txt_links} -->
    <!--开始文字类型的友情链接{foreach from=$txt_links item=link}-->
    [<a href="{$link.url}" target="_blank" title="{$link.name}">{$link.name}</a>]
    <!--结束文字类型的友情链接{/foreach}-->
    <!-- {/if} -->
  </div>
 </div>
</div>
<!--{/if}-->
<!--友情链接 end-->
<div class="blank"></div>
<!-- #BeginLibraryItem "/library/page_footer.lbi" --><!-- #EndLibraryItem -->
</body>
</html>
