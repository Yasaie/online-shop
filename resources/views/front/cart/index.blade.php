@extends('front.layout')

@section('content')
    <div class="container dd">
        <div class="row cart" id="app-cart">

            <div class="col-lg-9 body_L_product">
                <div class="_body">

                    <h2 class="title-cart">سبد خرید</h2>

                    <div class="list_body" >

                            <li class="list_product" v-for="order in orders">
                                <a class="btn rm_btn btn-danger" href="javascript:;" @click="deleteOrder(order.id)">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>

                                <a :href="productPage(order.product_id)">
                                    <img class="img" :src="order.image">
                                </a>

                                <div class="information">
                                    <h2>
                                        <a :href="productPage(order.product_id)">@{{order.name}}</a>
                                    </h2>
                                    <div class="shop_name">فروشنده: @{{ order.seller }}</div>
                                        <div class="shop_info_product" v-if="order.service">
                                            @{{ order.service }}
                                        </div>
                                </div>

                                <div class="add_product" v-if="order.amount">
                                    تعداد
                                    <select class="mdb-select md-form" v-model="order.quantity" @change="updateQuantity(order.id, order.quantity)">
                                        <option :value="option" v-for="option in order.amount">@{{ option }}</option>
                                    </select>
                                </div>
                                <div class="text-danger" v-else>
                                    موجودی کافی نمی‌باشد
                                </div>

                                <div class="information_unit">
                                    <span>@{{ commaPrice(order.price * order.quantity) }}</span>
                                    <span class="unit">{{config('app.current_currency')->title}}</span>
                                </div>
                            </li>

                    </div>


                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 info_cart" >
                <div class="_body">


                    <div class="box_1" >
                        <li class="list_item">
                    <span class="name_">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>

                        مبلغ کل (@{{ total.count }} کالا)</span>
                            <span class="val_">@{{ commaPrice(total.prev) }} {{config('app.current_currency')->title}}</span>
                        </li>


                        <li class="list_item">
                            <span class="name_">
                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                    سود شما از خرید
                                </span>
                            <span class="val_">@{{ commaPrice(total.off) }} {{config('app.current_currency')->title}}
                                (@{{ total.percent }} %)
                                </span>
                        </li>

                    </div>


                    <div class="box_2" >

                        <p class="info">مبلغ قابل پرداخت:</p>
                        <p class="money">@{{ commaPrice(total.price) }} {{config('app.current_currency')->title}}</p>
                        <a name="" id="" class="btn btn-success" href="#" role="button">ثبت سفارش</a>


                    </div>


                </div>

                <div class="_body _body_p" style="margin-top: 10px;">

                        <p>
                            محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می&zwnj;شوند. در
                            صورت عدم ثبت سفارش، تورکان ایپک یولی
    
                            هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد. </p>
    
                </div>


            </div>




        </div>
    </div>

@endsection

@section('footer_include')
    <script>
        var product_page = '{{route('product', 'product_id')}}';
    </script>
    <script type="text/javascript" src="{{asset('assets/front/js/cart.min.js')}}"></script>
@endsection