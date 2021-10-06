<script>
var app_url = "{{url('/')}}";
var csrf_token = "{{csrf_token()}}";
var shopOwlArg = {"productsCarousel": {}};
</script>

<!-- ---style====================================================== -->
<link rel='stylesheet' href='{{asset("assets/front/css/main.css")}}' type='text/css' media='all'/>
@if(isRTL())
    <link href="{{asset("assets/front/rtl.css")}}" rel="stylesheet">
@endif

<!-- ---script====================================================== -->
<script type="text/javascript" src="{{ asset('vendor/cruder/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/vue.min.js') }}"></script>

<script type='text/javascript' src='{{ asset("assets/front/js/plugins.min.js") }}' async defer></script>
<script type='text/javascript' src='{{ asset("assets/front/js/functions.min.js") }}' async defer></script>
<script type="text/javascript" src="{{ asset('assets/front/plugin/zoom-master/jquery.zoom.min.js') }}" async defer></script>
<script type="text/javascript" src="{{ asset('vendor/cruder/plugins/inputmask/jquery.inputmask.min.js') }}" async defer></script>
