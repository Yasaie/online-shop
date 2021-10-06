@extends('front/layout')

@section('page-title', $current_category->title)

@section('content')

    <div class="container-fluid app_filter">
        <div class="row" id="results">

            <div class="col-lg-2 col-md-2 col-sm-2  filter">
                @include('front.category.sidebar')
            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 result">

                @include('front.category.navbar')

                @include('front.category.results')

            </div>
        </div>
    </div>

@endsection

@section('footer_include')
    <script>
        var category = {{ $id }};
        var q_param = {!! json_encode(request()->all()) !!};
    </script>
    <script type="text/javascript" src="{{ asset('assets/front/js/category.min.js') }}" async defer></script>
@endsection