@extends('front.profile.layout')

@section('body')

    <div class="app_order">
        <div class="mb-2 title">
            <h2 class="titel_method order_id">سفارش {{$cart->id}}</h2>
            <span class="order_time">ثبت شده در تاریخ {{$cart->created_at->format('l j F Y')}}</span>
        </div>

        <div class="method_body info_user row">
            <div class="col-lg-6 item">
                <span class="block name">تحویل گیرنده</span>
                <span class="block val">{{Auth::user()->full_name}}</span>
            </div>

            <div class="col-lg-6 item">
                <span class="block name"> شماره تماس تحویل گیرنده</span>
                <span class="block val">{{ Auth::user()->getProfile('mobile')}}</span>
            </div>

            <div class="col-lg-6 item">
                <span class="block name"> نحوه ارسال سفارش</span>
                <span class="block val">سرویس فروشگاه</span>
            </div>

            <div class="col-lg-6 item">
                <span class="block name"> هزینه ارسال</span>
                <span class="block val">
                    @if($post_price)
                        {{ convertPrice($post_price, 'irr', config('app.current_currency'), 1) }} {{ config('app.current_currency')->title }}
                    @else
                        رایگان
                    @endif
                </span>
            </div>

            <div class="col-lg-6 item">
                <span class="block name"> تعداد مرسوله</span>
                <span class="block val">{{$cart->orders()->count()}}</span>
            </div>

            <div class="col-lg-6 item">
                <span class="block name"> مبلغ کل</span>
                <span class="block val">{{ convertPrice($payable_price, 'irr', config('app.current_currency'), 1) }} {{ config('app.current_currency')->title }}</span>
            </div>

            <div class="col-lg-12 item">
                <span class="block name"> آدرس تحویل گیرنده</span>
                <span class="block val">
                    {{ Auth::user()->country->name }} -
                    {{ Auth::user()->state->name }} -
                    {{ Auth::user()->city->name }} -
                    {{ Auth::user()->getProfile('address') }} -
                    {{ Auth::user()->getProfile('postal_code') }}
                </span>
            </div>

        </div>
        <a style="margin-top: 20px;" class="btn btn-success" href="{{route('profile')}}" role="button">ویرایش اطلاعات
            تحویل
            گیرنده</a>

        <hr>

        <div class="method_body route_product" data-level="{{$cart->status_id - 5 > 1 ? $cart->status_id - 5 : 1}}">

        <span class="level disactive">
            <img src="{{asset('assets/front/image/order/user.svg')}}">
            @if($cart->status_id > 6)
                <a>@lang('inc/cart.success')</a>
            @else
                <a>@lang('inc/cart.' . $cart->status)</a>
            @endif
        </span>

            <span class="level_betven disactive">
               <span> <i class="fa fa-check" aria-hidden="true"></i></span>

        </span>

            <span class="level disactive">
                <img src="{{ asset('assets/front/image/order/check.svg') }}">
                <a>@lang('inc/cart.checking')</a>
        </span>

            <span class="level_betven disactive">
                <span> <i class="fa fa-check" aria-hidden="true"></i></span>

         </span>

            <span class="level disactive">
                <img src="{{ asset('assets/front/image/order/prepare.svg') }}">
                    <a>@lang('inc/cart.ready')</a>
        </span>

            <span class="level_betven disactive">
                    <span> <i class="fa fa-check" aria-hidden="true"></i></span>

         </span>

            <span class="level disactive">
                        <img src="{{ asset('assets/front/image/order/post.svg') }}">
                        <a>@lang('inc/cart.sending')</a>
                    </span>

            <span class="level_betven disactive">
                    <span> <i class="fa fa-check" aria-hidden="true"></i></span>

                     </span>

            <span class="level disactive">
                    <img src="{{ asset('assets/front/image/order/clinet.svg') }}">
                            <a>@lang('inc/cart.received')</a>
                        </span>

        </div>

        <span class="list_titel">لیست محصولات</span>

        <div class="method_body info_product row">

            <table class="table">
                <thead>

                <tr>
                    <th id="main_th"> محصول</th>
                    <th> تعداد</th>
                    <th> قیمت واحد</th>
                    <th> قیمت کل</th>
                    <th> تخفیف</th>
                    <th>قیمت نهایی</th>

                </tr>
                </thead>

                <tbody>

                @foreach($cart->orders as $order)
                    <tr>
                        <td scope="row">

                            <div class="body">

                                <img class="image_product"
                                     src="{{$order->product->firstThumb()}}">
                                <div style="font-size: 12px">
                                    <a href="{{route('product', ['id' => $order->product->id, 'slug' => $order->product->slug])}}">
                                        <span class="name">نام محصول : </span><br>
                                        {{$order->product->title}}
                                    </a>

                                    @if($order->seller->service)
                                        <div><span class="name">ویژگی : </span><br>
                                            {{$order->seller->service}}
                                        </div>
                                    @endif

                                    <div><span class="name">فروشنده : </span><br>
                                        {{$order->seller->user->full_name}}
                                    </div>

                                    <hr class="name_min">
                                    <div class="name_min"><span class="name ">تعداد : </span><br>
                                        {{$order->quantity}}
                                    </div>

                                    <div class="name_min"><span class="name "> قیمت واحد : </span><br>
                                        {{$order->current_price}} {{config('app.current_currency')->title}}
                                    </div>

                                    <div class="name_min"><span class="name ">قیمت کل : </span><br>
                                        {{number_format($order->current_price_no * $order->quantity)}} {{config('app.current_currency')->title}}
                                    </div>

                                    <div class="name_min"><span class="name ">تخفیف : </span><br>
                                        @if($order->prev_price > 0)
                                            {{number_format(($order->previous_price_no - $order->current_price_no) * $order->quantity)}} {{config('app.current_currency')->title}}
                                        @else
                                            0
                                        @endif
                                    </div>

                                    <div class="name_min"><span class="name ">قیمت نهایی : </span><br>
                                        {{number_format($order->current_price_no * $order->quantity)}}
                                        {{config('app.current_currency')->title}}
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td>
                            <div class="body">{{$order->quantity}}</div>
                        </td>

                        <td>
                            <div class="body">
                                {{$order->previous_price ?: $order->current_price}}
                                {{config('app.current_currency')->title}}
                            </div>
                        </td>

                        <td>
                            <div class="body">
                                {{number_format(($order->previous_price_no ?: $order->current_price_no) * $order->quantity)}}
                                {{config('app.current_currency')->title}}
                            </div>
                        </td>

                        <td>
                            <div class="body">
                                @if($order->prev_price > 0)
                                    {{number_format(($order->previous_price_no - $order->current_price_no) * $order->quantity)}}
                                    {{config('app.current_currency')->title}}
                                @else
                                    0
                                @endif
                            </div>
                        </td>

                        <td>
                            <div class="body">
                                {{number_format($order->current_price_no * $order->quantity)}}
                                {{config('app.current_currency')->title}}
                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>

            @if($cart->status == 'factor')
                <a class="btn btn-success" href="{{ route('cart.pay') }}" role="button" style="
               margin: 40px 20px;
               float: left;
           ">پرداخت</a>
            @endif
        </div>

    </div>

@endsection

@section('footer_include')
    <script>
        $(function () {
            var level = parseInt($(".route_product").data("level")) - 1;

            $(".level").each(function (indexInArray, valueOfElement) {
                if (indexInArray <= level) {
                    $(this).removeClass("disactive");
                }
            });

            $(".level_betven").each(function (indexInArray, valueOfElement) {
                if (indexInArray <= level) {
                    $(this).removeClass("disactive");
                }
            });
        });
    </script>
@endsection