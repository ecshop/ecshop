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
 <!-- #BeginLibraryItem "/library/filter_attr.lbi" --><!-- #EndLibraryItem -->
 <!-- #BeginLibraryItem "/library/price_grade.lbi" --><!-- #EndLibraryItem -->
<!-- TemplateEndEditable -->
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
      <h3><span>{$brand.brand_name}</span></h3>
      <div class="boxCenterList">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
          <td bgcolor="#ffffff" width="200" align="center" valign="middle">
          <div style="width:200px; overflow:hidden;">
          <!-- {if $brand.brand_logo} -->
            <img src="data/brandlogo/{$brand.brand_logo}" />
            <!-- {/if} -->
          </div>
          </td>
          <td bgcolor="#ffffff">
          {$brand.brand_desc|nl2br}<br />
            <!-- {if $brand.site_url} -->
            {$lang.official_site} <a href="{$brand.site_url}" target="_blank" class="f6">{$brand.site_url}</a><br />
            <!-- {/if} -->
            {$lang.brand_category}<br />
            <div class="brandCategoryA">
              <!-- {foreach from=$brand_cat_list item=cat} -->
            <a href="{$cat.url}" class="f6">{$cat.cat_name|escape:html} {if $cat.goods_count}({$cat.goods_count}){/if}</a>
              <!-- {/foreach} -->
            </div>  
         </td>
        </tr>
      </table>
      </div>
     </div>
    </div>
    <div class="blank5"></div>
  
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
