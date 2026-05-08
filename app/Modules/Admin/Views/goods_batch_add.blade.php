@include('pageheader')
<div class="main-div">
<form action="goods_batch.php?act=upload" method="post" enctype="multipart/form-data" name="theForm" onsubmit="return formValidate()">
<table cellspacing="1" cellpadding="3" width="100%">
<tr>
    <td class="label">{{ $lang['export_format'] }}</td>
    <td><select name="data_cat" id="data_cat">
      <option value="0">{{ $lang['select_please'] }}</option>
      @foreach($data_format as $__k => $__v)<option value="{{ $__k }}">{{ $__v }}</option>@endforeach
    </select></td>
  </tr>
  <tr>
    <td class="label">{{ $lang['goods_cat'] }}</td>
    <td><select name="cat" id="cat">
      <option value="0">{{ $lang['select_please'] }}</option>
      {{ $cat_list }}
    </select></td>
  </tr>
  <tr>
    <td class="label">{{ $lang['file_charset'] }}</td>
    <td><select name="charset" id="charset">
      @foreach($lang_list as $__k => $__v)<option value="{{ $__k }}">{{ $__v }}</option>@endforeach
    </select></td>
  </tr>
  <tr>
    <td class="label">
      <a href="javascript:showNotice('noticeFile');" title="{{ $lang['form_notice'] }}"><img src="images/notice.gif" width="16" height="16" border="0" alt="{{ $lang['form_notice'] }}"></a>
      {{ $lang['csv_file'] }}</td>
    <td><input name="file" type="file" size="40">
    <br />
      <span class="notice-span" @if($help_open)style="display:block" @else style="display:none" @endif id="noticeFile">{{ $lang['notice_file'] }}</span></td>
  </tr>
  @foreach($download_list as $charset => $download)
  <tr>
    <td>&nbsp;</td>
    <td><a href="goods_batch.php?act=download&charset={{ $charset }}">{{ $download }}</a></td>
  </tr>
  @endforeach
  <tr align="center">
    <td colspan="2"><input name="submit" type="submit" id="submit" value="{{ $lang['button_submit'] }}" class="button" /></td>
  </tr>
</table>
</form>
<table width="100%">
  <tr>
    <td>&nbsp;</td>
    <td width="80%">{{ $lang['use_help'] }}</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<script src="../js/utils.js"></script>
<script src="validator.js"></script>

<script language="JavaScript">
    var elements;
    onload = function()
    {
        // 文档元素对象
        elements = document.forms['theForm'].elements;

        // 开始检查订单
        startCheckOrder();
    }

    /**
     * 检查是否底级分类
     */
    function checkIsLeaf(selObj)
    {
        if (selObj.options[selObj.options.selectedIndex].className != 'leafCat')
        {
            alert(goods_cat_not_leaf);
            selObj.options.selectedIndex = 0;
        }
    }

    /**
     * 检查输入是否完整
     */
    function formValidate()
    {
        if (elements['cat'].value <= 0)
        {
            alert(please_select_cat);
            return false;
        }
        if (elements['file'].value == '')
        {
            alert(please_upload_file);
            return false;
        }
        return true;
    }
</script>

@include('pagefooter')