@extends('front.layout')

@section('content')

    <div class="container dd">
        <div class="row cart">


            <div class="col-lg-9 body_L_product">
                <div class="_body">

                    <h2 class="title-cart">سبد خرید</h2>

                    <div class="list_body">

                        @foreach($cart as $order)
                            @php($seller = $order->seller)
                            <li class="list_product">
                                <a class="btn rm_btn btn-danger" href="#">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>

                                <a href="{{route('product', $seller->product->id)}}">
                                    <img class="img"
                                         src="{{$seller->product->getFirstMedia('images')->getFullUrl('small')}}">
                                </a>

                                <div class="information">
                                    <h2>
                                        <a href="{{route('product', $seller->product->id)}}">{{$seller->product->title}}</a>
                                    </h2>
                                    <div class="shop_name">فروشنده: {{$seller->user->full_name}}</div>
                                    @if($seller->service)
                                        <div class="shop_info_product">
                                            {{$seller->service}}
                                        </div>
                                    @endif
                                </div>

                                <div class="add_product">
                                    تعداد
                                    <select class="mdb-select md-form">
                                        @for($i = 1; $i <= $seller->amount; $i++)
                                            <option value="{{$i}}" {{$order->quantity == $i ? 'selected' : ''}}>{{$i}}</option>
                                        @endfor
                                    </select>

                                </div>

                                <div class="information_unit">
                                    <span>{{$seller->current_price}}</span>
                                    <span class="unit"> {{config('app.current_currency')->title}} </span>
                                </div>
                            </li>
                        @endforeach

                    </div>


                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 info_cart">
                <div class="_body">


                    <div class="box_1">
                        <li class="list_item">
                    <span class="name_">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>

                        مبلغ کل ({{$cart->count()}} کالا)</span>
                            <span class="val_">{{number_format($total_prev)}} {{config('app.current_currency')->title}}</span>
                        </li>


                        <li class="list_item">
                            <span class="name_">
                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                    سود شما از خرید
                                </span>
                            <span class="val_">{{number_format($total_prev - $total)}} {{config('app.current_currency')->title}}
                                ({{getPercentage($total_prev, $total)}} %)
                                </span>
                        </li>

                    </div>


                    <div class="box_2">

                        <p class="info">مبلغ قابل پرداخت:</p>
                        <p class="money">{{number_format($total)}} {{config('app.current_currency')->title}}</p>
                        <a name="" id="" class="btn btn-success" href="#" role="button">ثبت سفارش</a>


                    </div>


                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 info_cart">
                <div class="_body _body_p">

                    <p>
                        محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می&zwnj;شوند. در
                        صورت عدم ثبت سفارش، تورکان ایپک یولی

                        هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد. </p>

                </div>

            </div>


        </div>
    </div>




@endsection