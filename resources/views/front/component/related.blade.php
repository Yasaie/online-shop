@php($section_id = 'section_' . (microtime(1) * 10000))
<script>
    emallshopOwlArg.productsCarousel.{{$section_id}} = {
        "autoplay": "true",
        "loop": "true",
        "navigation": "true",
        "dots": "true",
        "rp_desktop": "5",
        "rp_small_desktop": "5",
        "rp_tablet": "4",
        "rp_mobile": "3",
        "rp_small_mobile": "1"
    }
</script>

<div class="wpb_wrapper">
    <div id="{{$section_id}}" class="product-section products_carousel recent-products">
        <div class="section-header">
            <div class="section-title">
                <h3>{{$component_title}}</h3>
            </div>
        </div>
        <div class="section-content woocommerce">

            <div class="product-items">
                <ul class="products product-style1 product-carousel owl-carousel"
                    data-navigation="0" data-pagination="0">
                    @foreach($product_list as $rp)
                        @php($rp->seller = $rp->sellers->sortBy('current_price', SORT_NATURAL)->first())
                        <li class="slide-row">
                            <ul>
                                <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979
                                                                    status-publish first instock product_cat-93 product_tag-91 product_tag-90
                                                                    has-post-thumbnail shipping-taxable purchasable product-type-variable"
                                    data-postid="post-979">


                                    <div class="product-entry">

                                        <div class="product-image product-image-style2">
                                            <a href="product.html"
                                               class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <img width="300" height="354"
                                                         src="{{$rp->getFirstMedia('images') ? $rp->getFirstMedia('images')->getFullUrl('small') : asset('assets/front/image/no-default-thumbnail.png')}}"
                                                         class="front-image wp-post-image"
                                                         alt="{{$rp->title}}">
                                            </a>

                                        </div>

                                        <div class="product-content">

                                            <div class="product-title-rating">
                                                <a class="product-title"
                                                   href="/product/{{$rp->id}}/{{$rp->title}}">
                                                    <h3>
                                                        {{$rp->title}}
                                                    </h3>
                                                </a>

                                            </div>
                                            @if($rp->seller)
                                                <div class="product-loop-price">
                                                                                <span class="price">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        @if($rp->seller->prev_price)
                                                                                            <del>{{$rp->seller->previous_price}} {{Config::get('app.current_currency')->title}}</del>
                                                                                            -
                                                                                            <span>{{getPercentage($rp->seller->previous_price, $rp->seller->current_price)}}%</span>
                                                                                            -
                                                                                        @endif
                                                                                        {{$rp->seller->current_price}}
                                                                                        <span class="woocommerce-Price-currencySymbol">
                                                                                            {{Config::get('app.current_currency')->title}}
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            @endif


                                            <div class="product-buttons">
                                                <div class="product-cart">
                                                    <a href="product.html" data-quantity="1"
                                                       class="button product_type_variable add_to_cart_button"
                                                       data-product_id="979" data-product_sku=""
                                                       rel="nofollow">انتخاب
                                                        گزینه&zwnj;ها</a>
                                                </div>
                                            </div>

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
