<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="{$keywords}" />
<meta name="Description" content="{$description}" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>{$page_title}</title>
<!-- TemplateEndEditable --><!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable -->
<link rel="shortcut icon" href="favicon.ico" />
<link href="{$ecs_css_path}" rel="stylesheet" type="text/css" />
<!-- {if $cat_style} -->
<link href="{$cat_style}" rel="stylesheet" type="text/css" />
<!-- {/if} -->
{* 包含脚本文件 *}
{insert_scripts files='common.js,global.js,compare.js'}
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
 <!-- #BeginLibraryItem "/library/history.lbi" --><!-- #EndLibraryItem -->
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="左边广告区域（宽200px）" -->
<!-- TemplateEndEditable -->
    <!--AD end-->
  </div>
  <!--left end-->
  <!--right start-->
  <div class="AreaR">
	 <!--组合搜索 开始-->
	  <!--{if $brands.1 || $price_grade.1 || $filter_attr_list}-->
	  <div class="box">
		 <div class="box_1">
			<h3><span>{$lang.goods_filter}</span></h3>
			<!--{if $brands.1}-->
			<div class="screeBox">
			  <strong>{$lang.brand}：</strong>
				<!--{foreach from=$brands item=brand}-->
					<!-- {if $brand.selected} -->
					<span>{$brand.brand_name}</span>
					<!-- {else} -->
					<a href="{$brand.url}">{$brand.brand_name}</a>&nbsp;
					<!-- {/if} -->
				<!--{/foreach}-->
			</div>
			<!--{/if}-->
			<!--{if $price_grade.1}-->
			<div class="screeBox">
			<strong>{$lang.price}：</strong>
			<!--{foreach from=$price_grade item=grade}-->
				<!-- {if $grade.selected} -->
				<span>{$grade.price_range}</span>
				<!-- {else} -->
				<a href="{$grade.url}">{$grade.price_range}</a>&nbsp;
				<!-- {/if} -->
			<!--{/foreach}-->
			</div>
			<!--{/if}-->
			<!--{foreach from=$filter_attr_list item=filter_attr}-->
      <div class="screeBox">
			<strong>{$filter_attr.filter_attr_name|escape:html} :</strong>
			<!--{foreach from=$filter_attr.attr_list item=attr}-->
				<!-- {if $attr.selected} -->
				<span>{$attr.attr_value}</span>
				<!-- {else} -->
				<a href="{$attr.url}">{$attr.attr_value}</a>&nbsp;
				<!-- {/if} -->
			<!--{/foreach}-->
			</div>
      <!--{/foreach}-->
		 </div>
		</div>
		<div class="blank5"></div>
	  <!-- {/if} -->
	 <!--组合搜索 结束-->
   <!-- TemplateBeginEditable name="右边区域" -->
<!-- #BeginLibraryItem "/library/recommend_best.lbi" --><!-- #EndLibraryItem -->
  <!-- #BeginLibraryItem "/library/goods_list.lbi" --><!-- #EndLibraryItem -->
  <!-- #BeginLibraryItem "/library/pages.lbi" --><!-- #EndLibraryItem -->
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
