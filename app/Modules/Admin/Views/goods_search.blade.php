<div class="form-div">
  <form action="javascript:searchGoods()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    @if(request()->query('act') != "trash")
    <!-- 分类 -->
    <select name="cat_id"><option value="0">{{ $lang['goods_cat'] }}</option>{{ $cat_list }}</select>
    <!-- 品牌 -->
    <select name="brand_id"><option value="0">{{ $lang['goods_brand'] }}</option>@foreach($brand_list as $__k => $__v)<option value="{{ $__k }}">{{ $__v }}</option>@endforeach</select>
    <!-- 推荐 -->
    <select name="intro_type"><option value="0">{{ $lang['intro_type'] }}</option>@foreach($intro_list as $__k => $__v)<option value="{{ $__k }}" @if($__k == request()->query('intro_type')) selected @endif>{{ $__v }}</option>@endforeach</select>
     @if($suppliers_exists == 1)    
      <!-- 供货商 -->
      <select name="suppliers_id"><option value="0">{{ $lang['intro_type'] }}</option>@foreach($suppliers_list_name as $__k => $__v)<option value="{{ $__k }}" @if($__k == request()->query('suppliers_id')) selected @endif>{{ $__v }}</option>@endforeach</select>
      @endif
      <!-- 上架 -->
      <select name="is_on_sale"><option value=''>{{ $lang['intro_type'] }}</option><option value="1">{{ $lang['on_sale'] }}</option><option value="0">{{ $lang['not_on_sale'] }}</option></select>
    @endif
    <!-- 关键字 -->
    {{ $lang['keyword'] }} <input type="text" name="keyword" size="15" />
    <input type="submit" value="{{ $lang['button_search'] }}" class="button" />
  </form>
</div>


<script language="JavaScript">
    function searchGoods()
    {

        @if(request()->query('act') != "trash")
        listTable.filter['cat_id'] = document.forms['searchForm'].elements['cat_id'].value;
        listTable.filter['brand_id'] = document.forms['searchForm'].elements['brand_id'].value;
        listTable.filter['intro_type'] = document.forms['searchForm'].elements['intro_type'].value;
          @if($suppliers_exists == 1)
          listTable.filter['suppliers_id'] = document.forms['searchForm'].elements['suppliers_id'].value;
          @endif
        listTable.filter['is_on_sale'] = document.forms['searchForm'].elements['is_on_sale'].value;
        @endif

        listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['page'] = 1;

        listTable.loadList();
    }
</script>
