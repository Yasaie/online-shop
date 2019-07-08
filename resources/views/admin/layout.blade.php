<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | @yield('title')</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

@include('admin.layout.styles')

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    @include('admin.layout.navbar')
    @include('admin.layout.sidebar')
    <div class="content-wrapper">
    @yield('body')
    </div>
    @include('admin.layout.control')
</div>

@include('admin.layout.scripts')

</body>
</html>
