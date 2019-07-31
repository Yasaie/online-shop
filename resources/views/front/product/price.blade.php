<div class="col-lg-4 col-md-12 saler_box_product">
    <div class="parent">
        @php($sellers->first()->rates = $sellers->first()->user
                ->products
                ->unique()
                ->avg('product_rate'))
        <div class="list_item">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span class="titel_item">  فروشنده :  </span>
            <span class="val_item">{{$sellers->first()->user->full_name}}</span>
            <div style="margin-top: 10px" class="rateYo_saler" data-rateyo-rating="{{$sellers->first()->rates}}"></div>
        </div>

        @if($sellers->first()->service)
            <div class="list_item">
                <i class="fa fa-share" aria-hidden="true"></i>
                <span class="titel_item">  خدمات :  </span>
                <span class="val_item">{{$sellers->first()->service}}</span>
            </div>
        @endif
        <div class="money_product list_item">
            @if($sellers->first()->prev_price)
                <div style="margin-bottom: 10px;">
                    <del class="value is_off">{{$sellers->first()->previous_price}}</del>
                    <span class="unit is_PR">{{$sellers->first()->off_percent}}%</span>
                </div>
            @endif

            <div>
                <span class="value ">{{$sellers->first()->current_price}}</span>
                <span class="unit">{{Config::get('app.current_currency')->title}}</span>
            </div>
        </div>


        <div class="list_item by_btn">
            <a>افزودن به سبد خرید <span class="shadow"></span> </a>

            <i class="fa fa-plus-square" aria-hidden="true"></i>

        </div>

        @if(! $sellers->isEmpty() and $sellers->shift())
            <div class="list_item sho_more">
                <a class="right">{{$sellers->count()}} فروشنده دیگر این کالا</a>
                <a href="#salers_main_box-titel" id="show-salers_main_box" onclick="remove_salers_main_box_mobile()"
                   class="left">مشاهده </a>
            </div>
        @endif

    </div>
</div>