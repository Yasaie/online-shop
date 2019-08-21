@extends('front.profile.layout')

@section('body')

    <section class="col-lg-9 left_box app_order">

        <div class="mb-2 title">
            <h2 class="titel_method order_id">سفارش {{$cart->id}}</h2>
            <span class="order_time">ثبت شده در تاریخ {{$cart->created_at->format('l j F Y')}}</span>
        </div>


        <div class="method_body info_user row">
            <div class="col-lg-6 item">
                <a class="block name">تحویل گیرنده:</a>
                <a class="block val">{{Auth::user()->full_name}}</a>
            </div>

            <div class="col-lg-6 item">
                <a class="block name"> شماره تماس تحویل گیرنده:</a>
                <a class="block val">۰۹۳۵۸۱۱۸۷۰۸</a>
            </div>


            <div class="col-lg-6 item">
                <a class="block name"> نحوه ارسال سفارش:</a>
                <a class="block val">پست پیشتاز
                </a>
            </div>


            <div class="col-lg-6 item">
                <a class="block name"> هزینه ارسال :</a>
                <a class="block val">۶,۵۰۰ تومان</a>
            </div>


            <div class="col-lg-6 item">
                <a class="block name"> تعداد مرسوله:</a>
                <a class="block val">{{$cart->orders()->count()}}</a>
            </div>

            <div class="col-lg-6 item">
                <a class="block name"> مبلغ کل: </a>
                <a class="block val">۲۹,۰۰۰ تومان</a>
            </div>


            <div class="col-lg-12 item">
                <a class="block name"> آدرس تحویل گیرنده:</a>
                <a class="block val">آذربایجان شرقی، __FAKE_CITY__، استان :آذربایجان شرقی شهر :اسکو - سهند فاز 2- بلوار
                    مهر-20 متری اول- مجتمع شهریار-بلوک 2 غربی- واحد B0
                </a>
            </div>


        </div>
        <a style="margin-top: 20px;" name="" id="" class="btn btn-success" href="{{route('profile')}}" role="button">ویرایش اطلاعات تحویل
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
            <a name="" id="" class="btn btn-success" href="#" role="button" style="
               margin: 40px 20px;
               float: left;
           ">پرداخت</a>
            @endif
        </div>

    </section>

@endsection

@section('footer_include')
<script>
        $(function(){
            var level=parseInt($(".route_product").data("level"))-1;
          
            $(".level").each( function (indexInArray, valueOfElement) {
                if(indexInArray<=level){
                    $(this).removeClass("disactive");
                }
            });

            $(".level_betven").each( function (indexInArray, valueOfElement) {
               if(indexInArray<=level){
                   $(this).removeClass("disactive");
               }
           });
        });
    </script>
@endsection