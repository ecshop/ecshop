<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{ $lang['cp_home'] }}@if($ur_here) - {{ $ur_here }} @endif</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<script src="../js/transport.js"></script>
<script src="common.js"></script>
<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
@foreach($lang['js_languages'] as $key => $item)
var {{ $key }} = "{{ $item }}";
@endforeach
//-->
</script>
</head>
<body>

<h1>
@if($action_link)
<span class="action-span"><a href="{{ $action_link['href'] }}">{{ $action_link['text'] }}</a></span>
@endif
@if($action_link2)
<span class="action-span"><a href="{{ $action_link2['href'] }}">{{ $action_link2['text'] }}</a>&nbsp;&nbsp;</span>
@endif
<span class="action-span1"><a href="index.php?act=main">{{ $lang['cp_home'] }}</a> </span><span id="search_id" class="action-span1">@if($ur_here) - {{ $ur_here }} @endif</span>
<div style="clear:both"></div>
</h1>
