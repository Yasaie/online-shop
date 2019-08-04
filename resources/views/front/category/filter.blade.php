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

                <div class="f-box">
                    <form class="filter_switch">

                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>

                        <label class="title_">فقط کالاهای اصل</label>
                    </form>
                </div>


                <div class="f-box filter_value">

                <span class="filter_title">
                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                        رنگ
                </span>

                    <ul>


                        <label class="custom_ch">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span> همه
                        </label>


                        <label class="custom_ch">
                            <input type="checkbox">
                            <span class="checkmark"></span> بنفش
                        </label>

                        <label class="custom_ch">
                            <input type="checkbox">
                            <span class="checkmark"></span> صورتی
                        </label>


                        <label class="custom_ch">
                            <input type="checkbox">
                            <span class="checkmark"></span> سیاه
                        </label>


                        <label class="custom_ch">
                            <input type="checkbox">
                            <span class="checkmark"></span> بنفش
                        </label>

                    </uL>


                </div>


            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 result">

                <div class="category_map">
                    <a href="{{route('home')}}">{{setting('site.title')}}</a> /
                    @foreach($current_category->tree as $tree)
                    <a href="{{route('category', $tree->id)}}">{{$tree->title}}</a>
                        @if(last($current_category->tree) != $tree)
                            /
                        @endif
                    @endforeach
                    <span class="sort_size">{{$products->count()}} کالا</span>
                </div>

                <div class="result_body">

                    <div class="sort">
                        <i class="fa icon fa-sort-amount-asc" aria-hidden="true"></i>
                        <span class="sort_titel">مرتب سازی بر اساس : </span>
                        <a class="sort_name active_sort_name">بیشترین تخفیف</a>
                        <a class="sort_name">ارزان ترین</a>
                        <a class="sort_name">گران ترین</a>
                        <a class="sort_name">پربازدید ترین</a>
                    </div>

                    <div id="resalts" class="row">

                        @foreach($products as $product)
                            @php($product->seller = $product->sellers
                                ->where('amount', '>', 0)
                                ->sortBy('current_price', SORT_NATURAL)
                                ->first())

                            <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                            <a href="{{route('product', $product->id)}}" class="image_box">
                                @php($img = $product->getFirstMedia('images'))
                                <img src="{{$img ? $img->getFullUrl('small') : asset('assets/front/image/no-default-thumbnail.png')}}">
                            </a>
                            <div class="info_box">
                                <div class="resalt_name">
                                    <a href="{{route('product', $product->id)}}">{{$product->title}}</a>
                                </div>
                                @if($product->seller)

                                @if($product->seller->prev_price)
                                <div class="resalt_off"><span>{{getPercentage($product->seller->previous_price, $product->seller->current_price)}}%</span>
                                    <del>{{$product->seller->previous_price}}</del>
                                </div>
                                    @endif

                                    <div class="resalt_price"><a>{{$product->seller->current_price}} <span class="unit"> {{Config::get('app.current_currency')->title}}</span></a></div>
                                @endif
                            </div>
                        </div>
                        @endforeach


                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt" style="display: none">
                            <div class="image_box">
                                <img src="https://dkstatics-public.digikala.com/digikala-products/4768276.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                            </div>
                            <div class="info_box">
                                <div class="resalt_name"><a>مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                <div class="resalt_off"><span>٪۳۸</span>
                                    <del>۳۲۰,۰۰۰</del>
                                </div>
                                <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
