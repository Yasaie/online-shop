<div id="sellers">
    <div class="row salers_main_box">
        <h3 id="salers_main_box-titel" class="col-md-12 title_">
            لیست فروشنده </h3>
    </div>

    <div class="row salers_main_box_mobile">
        <span onclick="remove_salers_main_box_mobile()" id="exit-salers_main_box_mobile">بازگشت</span>

        @foreach($sellers as $seller)
            @php($seller->rates = $seller->user
                ->products
                ->unique()
                ->avg('product_rate'))
            <div class="saler_list">
                <span class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">{{$seller->user->full_name}}</a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" data-rateyo-rating="{{$seller->rates}}"></div>
                </span>

                @if($seller->service)
                    <span class="col-md-3 list_salers">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                        {{$seller->service}}
                    </span>
                @endif
                <div>
                    <span class="money_mob">
                        <a class="money_">
                            <span class="unit"> {{$seller->current_price}} </span>
                            {{config('app.current_currency')->title}}
                        </a>
                    </span>
                    <span class="btn_add_to_bag">
                        <a href="{{route('cart.add', $seller->id)}}" class="btn_add_to">افزودن به سبد خرید</a>
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    @foreach($sellers as $seller)
        @php($seller->rates = $seller->user
            ->products
            ->unique()
            ->avg('product_rate'))
        <div class="row salers_main_box list_saler">

        <span class="col-md-3 list_salers"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <a class="name_of_saler">{{$seller->user->full_name}}</a>
            <a class="point">
                <div style="margin-top: 10px" class="rateYo_saler" data-rateyo-rating="{{$seller->rates}}"></div>
            </a>
        </span>

            @if($seller->service)
                <span class="col-md-3 list_salers">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    {{$seller->service}}
                </span>
            @endif
            <span class="col-md-3 list_salers">
            <a class="money_">
                @if($seller->prev_price)
                    <del>{{$seller->previous_price}} {{Config::get('app.current_currency')->title}}</del> -
                    <span>{{getPercentage($seller->previous_price, $seller->current_price)}}%</span> -
                @endif
                <span class="unit">
                    {{$seller->current_price}}
                </span>
                {{Config::get('app.current_currency')->title}}
            </a>
        </span>
            <span class="col-md-3 list_salers">
            <a href="{{route('cart.add', $seller->id)}}" class="btn_add_to">افزودن به سبد خرید</a>
        </span>
        </div>
    @endforeach
</div>