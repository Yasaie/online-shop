<!-- Plugin Scripts -->
<script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/raphael-min.js')}}"></script>
{{--<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>--}}
<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/knob/jquery.knob.js')}}"></script>
<script src="{{asset('assets/admin/js/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- /Plugin Scripts -->

<!-- Inline Scripts -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- /Inline Scripts -->

<!-- Page Scripts -->
@yield('script')
<!-- /Page Scripts -->

<!-- Custom Scripts -->
<script src="{{asset('assets/admin/js/adminlte.min.js')}}" defer async></script>
<!-- /Custom Scripts -->
