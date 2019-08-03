<!-- Styles -->

<link rel="stylesheet" href="{{asset('assets/admin/css/main.css')}}">

@if(isRTL())
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/custom-style.css')}}">
@endif
<!-- /Styles -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
@yield('style')
