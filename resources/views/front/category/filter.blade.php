@extends('front/layout')

@section('content')

    <link href="{{ asset('assets/front/css/category.css') }}" rel="stylesheet">


    <div class="container-fluid app_filter">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2  filter">

                <div class="f-box">

                <span class="filter_title">
                        <i class="fa fa-align-right" aria-hidden="true"></i>
                        دسته‌بندی نتایج
                </span>

                    @if($current_category)
                        <ul class="ul">
                            @foreach($current_category->tree as $tree)
                                <div>
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <a href="{{route('category', $tree->id)}}">{{$tree->title}}</a>
                                </div>
                            @endforeach
                            @foreach($current_category->children as $child)
                                <li><a href="{{route('category', $child->id)}}">{{$child->title}}</a></li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="f-box">
                 
                        <span class="filter_title">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                جستجو در نتایج
                        </span>

                    <form class="filter_search">
                        <i class="fa fa-search icon" aria-hidden="true"></i>
                        <input placeholder="نام محصول مورد نظر را بنویسید" class="search_input">
                    </form>

                </div>

                <div class="f-box">

                    <form class="filter_switch">

                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>

                        <label class="title_">فقط کالاهای موجود</label>
                    </form>


                </div>


                @foreach($filters as $filter)
                    <div class="f-box filter_value">

                    <span class="filter_title">
                            <i class="fa fa-hashtag" aria-hidden="true"></i>
                            {{$filter->title}}
                    </span>

                        <ul>
                            @foreach($filter->detailValues as $value)
                                <label class="custom_ch">
                                    <input type="checkbox">
                                    <span class="checkmark"></span> {{$value->title}}
                                </label>
                            @endforeach
                        </ul>


                    </div>
                @endforeach


            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 result" id="results">

                <div class="category_map">
                    <a href="{{route('home')}}">{{setting('site.title')}}</a> /
                    @foreach($current_category->tree as $tree)
                        <a href="{{route('category', $tree->id)}}">{{$tree->title}}</a>
                        @if(last($current_category->tree) != $tree)
                            /
                        @endif
                    @endforeach
                    <span class="sort_size">@{{Object.keys(products).length}} کالا</span>
                </div>

                <div class="result_body">

                    <div class="sort">
                        <i class="fa icon fa-sort-amount-asc" aria-hidden="true"></i>
                        <span class="sort_titel">مرتب سازی بر اساس : </span>
                        <a class="sort_name active_sort_name">پربازدید ترین</a>
                        <a class="sort_name">بیشترین تخفیف</a>
                        <a class="sort_name">ارزان ترین</a>
                        <a class="sort_name">گران ترین</a>
                    </div>

                    <div id="resalts" class="row">

                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt" v-for="product in products">
                            <a :href="product.url" class="image_box">
                                <img :src="product.image ? product.image : '{{asset('assets/front/image/no-default-thumbnail.png')}}'">
                            </a>
                            <div class="info_box">
                                <div class="resalt_name">
                                    <a :href="product.url">@{{ product.title }}</a>
                                </div>

                                <div v-if="product.price">
                                    <div class="resalt_off" v-if="product.prev_price > 0">
                                        <span>@{{ product.off_percent }}%</span>
                                        <del>@{{ product.prev_price }}</del>
                                    </div>

                                    <div class="resalt_price">
                                        <a>
                                            <span>@{{ product.price }}</span>
                                            <span class="unit">{{Config::get('app.current_currency')->title}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
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