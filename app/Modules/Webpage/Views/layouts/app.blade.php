<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>商城</title>
<link rel="stylesheet" href="{{ asset('assets/layui@2.10.2/css/layui.css') }}">
<script src="{{ asset('assets/layui@2.10.2/layui.js') }}"></script>
<link rel="stylesheet" href="{{ asset('themes/default/css/app.css') }}">
<script src="{{ asset('themes/default/js/app.js') }}" defer></script>
@yield('style')
<script type="text/javascript">
layui.use(function () {
    var $ = layui.jquery;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})
</script>
</head>
<body>
@yield('content')
@yield('script')
</body>
</html>
