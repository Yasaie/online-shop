@extends('front/layout')

@section('content')
    <div id="main-content" class="site-content">
        <div class="container-fluid">
            <div class="row">
                <div id="primary" class="content-area col-md-12">

                    <div id="post-1125" class="post-1125 page type-page status-publish hentry">

                        <div class="page-content">

                            <!--#region Carousel  -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="https://dkstatics-public-2.digikala.com/digikala-adservice-banners/1000005426.jpg"
                                             alt="Los Angeles">
                                    </div>

                                    <div class="item">
                                        <img src="https://dkstatics-public.digikala.com/digikala-adservice-banners/1000007143.jpg"
                                             alt="Chicago">
                                    </div>


                                    <div class="item">
                                        <img src="https://dkstatics-public.digikala.com/digikala-adservice-banners/1000007139.jpg"
                                             alt="Chicago">
                                    </div>


                                    <div class="item">
                                        <img src="https://dkstatics-public.digikala.com/digikala-adservice-banners/1000007141.jpg"
                                             alt="Chicago">
                                    </div>


                                    <div class="item">
                                        <img src="https://dkstatics-public-2.digikala.com/digikala-adservice-banners/1000003803.jpg"
                                             alt="New York">
                                    </div>


                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <!--#endregion -->

                            <div class="row" style="margin-top: 20px">
                                <div class="col-sm-9 col-sm-pull-3">
                                    @foreach(setting('front.slider') as $slider)
                                        @include(
                                            'front.component.related',
                                            [
                                                'component_title' => $categories->firstWhere('id', $slider)->title,
                                                'product_list' => catsProducts($slider)->take(10)
                                            ]
                                        )
                                    @endforeach
                                </div>
                                <div class="col-sm-3 col-sm-push-9">

                                    <div class="wpb_single_image wpb_content_element vc_align_center">
                                        <figure class="wpb_wrapper vc_figure">
                                            <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                <img width="290" height="265" src="asset/image/2017/11/07b8450d.jpg"
                                                     class="vc_single_image-img attachment-full" alt="">
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="wpb_single_image wpb_content_element vc_align_center">
                                        <figure class="wpb_wrapper vc_figure">
                                            <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                <img width="290" height="265" src="asset/image/2017/11/32b2a741.jpg"
                                                     class="vc_single_image-img attachment-full" alt="">
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="wpb_widgetised_column wpb_content_element">
                                        <div class="wpb_wrapper">

                                            <div id="emallshop-products-5" class="widget emallshop_widget_products">
                                                <div class="widget-head">
                                                    <h3 class="" style="
                                                            font-size: 18px;
                                                            margin: 0;
                                                            padding:  10px 10px;
                                                            color: #444a6f;
                                                        ">آخرین محصولات</h3>
                                                </div>
                                                <ul class="product_list_widget owl-carousel productsCarousel-5d25842233a0d woocommerce">
                                                    <li class="slide-row">
                                                        <ul>

                                                            <li>

                                                                <div class="product-image">
                                                                    <a href="product.html" title="اجاق گاز روی میزی 2">
                                                                        <img width="300" height="354"
                                                                             src="asset/image/2017/11/5345564646-300x354.jpg"
                                                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                             alt=""> </a>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a href="product.html" title="اجاق گاز روی میزی 2">
                                                                                <span class="product-title">اجاق
                                                                                    گاز روی میزی 2</span>
                                                                    </a>

                                                                    <span class="product-price">
                                                                                <span class="woocommerce-Price-amount amount">3,000&nbsp;<span
                                                                                            class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                            </span>
                                                                </div>

                                                            </li>

                                                            <li>

                                                                <div class="product-image">
                                                                    <a href="product.html"
                                                                       title="موبایل هوشمند سامسونگ">
                                                                        <img width="300" height="354"
                                                                             src="asset/image/2017/11/12312535-300x354.jpg"
                                                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                             alt=""> </a>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a href="product.html"
                                                                       title="موبایل هوشمند سامسونگ">
                                                                                <span class="product-title">موبایل
                                                                                    هوشمند سامسونگ</span>
                                                                    </a>

                                                                    <span class="product-price">
                                                                                <span class="woocommerce-Price-amount amount">250&nbsp;<span
                                                                                            class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                            </span>
                                                                </div>

                                                            </li>

                                                            <li>

                                                                <div class="product-image">
                                                                    <a href="product.html" title="گوشی موبایل آیفون 7">
                                                                        <img width="300" height="354"
                                                                             src="asset/image/2017/11/3423534636-1-300x354.jpg"
                                                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                             alt=""> </a>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a href="product.html" title="گوشی موبایل آیفون 7">
                                                                                <span class="product-title">گوشی
                                                                                    موبایل آیفون 7</span>
                                                                    </a>

                                                                    <span class="product-price">
                                                                                <span class="woocommerce-Price-amount amount">250&nbsp;<span
                                                                                            class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                            </span>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide-row">
                                                        <ul>

                                                            <li>

                                                                <div class="product-image">
                                                                    <a href="product.html" title="کنسول بازی ps4">
                                                                        <img width="300" height="354"
                                                                             src="asset/image/2017/11/4234242424-300x354.jpg"
                                                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                             alt=""> </a>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a href="product.html" title="کنسول بازی ps4">
                                                                                <span class="product-title">کنسول
                                                                                    بازی ps4</span>
                                                                    </a>

                                                                    <span class="product-price">
                                                                                <span class="woocommerce-Price-amount amount">250&nbsp;<span
                                                                                            class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                            </span>
                                                                </div>

                                                            </li>

                                                            <li>

                                                                <div class="product-image">
                                                                    <a href="product.html" title="دوربین دیجیتال نیکون">
                                                                        <img width="300" height="354"
                                                                             src="asset/image/2017/11/r53453453-1-300x354.jpg"
                                                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                             alt=""> </a>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a href="product.html" title="دوربین دیجیتال نیکون">
                                                                                <span class="product-title">دوربین
                                                                                    دیجیتال نیکون</span>
                                                                    </a>

                                                                    <span class="product-price">
                                                                                <del><span class="woocommerce-Price-amount amount">29,000&nbsp;<span
                                                                                                class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                            </del>
                                                                            <ins><span class="woocommerce-Price-amount amount">19,000&nbsp;<span
                                                                                            class="woocommerce-Price-currencySymbol">تومان</span></span></ins>
                                                                            </span>
                                                                </div>

                                                            </li>

                                                            <li>

                                                                <div class="product-image">
                                                                    <a href="product.html" title="تلویزیون 54 اینچ">
                                                                        <img width="300" height="354"
                                                                             src="asset/image/2017/11/0-300x354.jpg"
                                                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                             alt=""> </a>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a href="product.html" title="تلویزیون 54 اینچ">
                                                                                <span class="product-title">تلویزیون
                                                                                    54 اینچ</span>
                                                                    </a>

                                                                    <span class="product-price">
                                                                                <span class="woocommerce-Price-amount amount">250&nbsp;<span
                                                                                            class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                            </span>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>

                                                <script type="text/javascript">
                                                    jQuery(document).ready(function ($) {
                                                        var emallshop_rtl = false;
                                                        if ($("body").hasClass("rtl")) {
                                                            emallshop_rtl = true;
                                                        }
                                                        $(".productsCarousel-5d25842233a0d").owlCarousel({
                                                            autoplay: false,
                                                            autoplayHoverPause: true,
                                                            loop: true,
                                                            rtl: emallshop_rtl,
                                                            items: 1,
                                                            nav: false,
                                                            navText: ['', ''],
                                                            dots: true,
                                                            lazyLoad: true,
                                                            smartSpeed: 1000,
                                                            rewind: true,
                                                            addClassActive: true
                                                        });
                                                        $('.owl-carousel').addClass('owl-theme');
                                                    });
                                                </script>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- .entry-content -->

                    </div>

                </div>

            </div>
        </div>
        <!-- .content-area -->
    </div>

@endsection