@php($section_id = 'section_' . (microtime(1) * 10000))
<script>
    shopOwlArg.productsCarousel.{{$section_id}} = {
        "autoplay": "true",
        "loop": "true",
        "navigation": "true",
        "dots": "true",
        "rp_desktop": {{ isset($count) ? $count : 5 }},
        "rp_small_desktop": {{ isset($count) ? $count : 5 }},
        "rp_tablet": {{ isset($count) ? ceil($count / 2) : 2 }},
        "rp_mobile": 1,
        "rp_small_mobile": 1
    }
</script>

<div class="wpb_wrapper">
    <div id="{{$section_id}}" class="product-section products_carousel recent-products">
        <div class="section-header">
            <div class="section-title">
                <h3>{{$component_title}}</h3>
            </div>
        </div>
        <div class="section-content shop">

            <div class="product-items">
                <ul class="products product-style1 product-carousel owl-carousel" data-navigation="0"
                    data-pagination="0">
                    @foreach($product_list as $rp)
                        @php($rp->seller = $rp->sellers
                            ->where('amount', '>', 0)
                            ->sortBy('current_price', SORT_NATURAL)
                            ->first())
                        <li class="slide-row">
                            <ul>
                                <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6 product product_custom">

                                    <div class="product-entry">

                                        <div class="product-image product-image-style2">
                                            <a href="{{route('product', $rp->only('id', 'slug'))}}"
                                               class="shop-LoopProduct-link shop-loop-product__link">
                                                <img width="300" height="354"
                                                     src="{{$rp->getFirstMedia('images') ? $rp->getFirstMedia('images')->getFullUrl('small') : asset('assets/front/image/no-default-thumbnail.png')}}"
                                                     class="front-image wp-post-image" alt="{{$rp->title}}">
                                            </a>

                                        </div>

                                        <div class="product-content">

                                            <div class="product-title-rating">
                                                <a class="product-title"
                                                   href="{{route('product', $rp->only('id', 'slug'))}}">
                                                    <h3>
                                                        {{$rp->title}}
                                                    </h3>
                                                </a>

                                            </div>
                                            @if($rp->seller)
                                                <div class="product-loop-price">
                                                    <span class="price">
                                                        <span class="shop-Price-amount amount">
                                                            @if($rp->seller->prev_price - $rp->seller->price > 0)
                                                                <del>{{$rp->seller->previous_price}} </del>

                                                                <span class="off_custom">
                                                                    {{getPercentage($rp->seller->previous_price, $rp->seller->current_price)}}%
                                                                </span>
                                                            @endif

                                                          <span class="product_price_custom">{{$rp->seller->current_price}}</span>  

                                                            <span class="shop-Price-currencySymbol">
                                                                {{Config::get('app.current_currency')->title}}
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>

                                                <div class="product-buttons">
                                                    <div class="product-cart btn btn-xs btn-primary">
                                                        <a href="{{route('cart.add', $rp->seller->id)}}" rel="nofollow">
                                                            افزودن به سبد خرید
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

