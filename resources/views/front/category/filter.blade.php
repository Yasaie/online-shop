@extends('front/layout')

@section('header_include')
    <link href="{{ asset('assets/front/css/category.css') }}" rel="stylesheet">
@endsection

@section('page-title', $ca)


@section('content')

    <div class="container-fluid app_filter">
        <div class="row">

            <div class="col-lg-2 col-md-2 col-sm-2  filter">
                @include('front.category.sidebar')
            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 result" id="results">

                @include('front.category.navbar')

                @include('front.category.results')

            </div>
        </div>
    </div>

@endsection

@section('footer_include')
    <script>
        new Vue({
            el: '#results',
            computed: {
                products: function () {
                    var list = {};

                    $.ajax({
                        url: app_url + '/api/product.json',
                        data: {
                            category: {{$id}}
                        },
                        async: false
                    }).done(function (r) {
                        list = r
                    });

                    return list;
                }
            }
        });
    </script>
@endsection