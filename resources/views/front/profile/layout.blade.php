@extends('front/layout')
@section('content')

<link href="{{ asset('assets/front/css/user_page.css') }}" rel="stylesheet">

<div class="container-fluid user_page">
    <div class="row">
        <section class="col-lg-3 right_box">


                <div class="profile">

                <img src="{{asset('assets/front/image/img_default_user.jpg')}}" class="user_image">
                         <h3 class="user_name">{{Auth::user()->full_name}}</h3>
                    <div class="user_action">

                        <div class="btn_" style="border-left: 1px dashed #bbb;">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="btn btn-link">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    <span>خروج</span>
                                </button>
                            </form>
                        </div>

                        <div class="btn_">
                            <a href="#" role="button">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <span>تغییر پسورد</span>
                            </a>
                        </div>
                    </div>

                 </div>


            <div class="user_methods">

                <h3 class="titel">حساب کاربری شما</h3>

                <a href="{{route('profile')}}" class="method">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    پروفایل
                </a>

                <a href="{{route('profile.orders')}}" class="method">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        همه سفارش ها
                </a>

                <a href="{{route('cart.index')}}" class="method">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    سبد خرید
                </a>

                <a href="{{route('profile.seller')}}" class="method">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    فروشنده شوید
                </a>
            </div>

        </section>

        @yield('body')
    </div>
</div>


@endsection