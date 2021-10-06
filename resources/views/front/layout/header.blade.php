<header id="header" class="header header-1">

    <div class="mobile_menu row">
        <img class="col-sm-2 col-xs-4" src="{{ asset('assets/front/image/logo.png') }}">
        <div class="btn_box col-sm-10 col-xs-8">

            <i onclick="$('.header-topbar ,.header-navigation').toggle(600)" class="fa fa-bars" aria-hidden="true"></i>

        </div>

    </div>

    <div class="header-topbar">
        <div class="container-fluid ">
            <div class="row flex_center " style="flex-wrap: wrap;">

                <div class="col-lg-3  col-md-3 col-sm-12 col-xs-12 text-left left_box-menu">
                    <div class="customer-support">

                        <div class="customer-support-email">
                            <select onchange="window.location.href = this.value" class="form-control select_form_con"
                                    id="sel1">
                                @foreach($currencies as $currency)
                                    <option value="{{route('currency', $currency->key)}}"
                                            {{config('app.current_currency') == $currency ? 'selected' : ''}}>
                                        {{$currency->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="customer-support-call">
                            <select onchange="window.location.href = this.value" class="form-control select_form_con"
                                    id="sel1">
                                @foreach(config('global.langs') as $lang)
                                    <option value="{{route('language', $lang->getId())}}"
                                            {{config('app.locale') == $lang->getId() ? 'selected' : ''}}>
                                        {{$lang->getNativeName()}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <form class="col-lg-6 col-md-6 col-sm-12  col-xs-12 search_box_main"
                      action="https://www.google.com/search">
                    <input type="hidden" name="hl" value="{{ app()->getLocale() }}">
                    <input type="hidden" name="sitesearch" value="{{ url('/') }}">

                    <button type="submit" class="btn_search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <input name="q" width="100%" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                </form>
                <a onclick="$('.mobild_category').toggle(500)" class="btn btn-success list_btn_show"
                   href="#" role="button">دسته بندی ها</a>

                <div class="col-lg-3 col-md-3 col-sm-12  col-xs-12  text-right info_head_left">

                    <div class="topbar-right">

                        @if(Auth::check())
                            <span class="user-login user_popup">

                                    <a href="{{Auth::check() ? route("profile") : route("login")}}"><i
                                                class="fa fa-user-o" aria-hidden="true"></i>
                                    <span>{{Auth::user()->full_name}}</span>
                                    </a>

                                    <span class="user_popu_menu">
                                        <span class="pop_head"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                        <div class="pop_body">

                                                @role('admin')
                                                    <a href="{{route('admin.home')}}" class="method">
                                                        <i class="fa fa-dashboard" aria-hidden="true"></i>
                                                        <span>پنل مدیریت</span>
                                                    </a>
                                                @endrole

                                                @role('seller')
                                                    <a href="{{route('admin.home')}}" class="method">
                                                        <i class="fa fa-dashboard" aria-hidden="true"></i>
                                                        <span>پنل فروشندگان</span>
                                                    </a>
                                                @endrole

                                                <a href="{{route('profile')}}" class="method">
                                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                                     <span>پروفایل</span>
                                                </a>

                                                 <a class="method" href="{{route('profile.orders')}}">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span>همه سفارش ها</span>
                                                 </a>

                                                <form action="{{route('logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn-link btn method"
                                                            style="width: 100%">
                                                        <i class="fa fa-share" aria-hidden="true"></i>
                                                        <span>خروج</span>
                                                    </button>
                                                </form>

                                        </div>

                                    </span>
                            </span>

                            <span class="user-login ">
                                <a href="{{route("cart.index")}}">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <span>سبد خرید ({{Auth::user()->myOrders(0)->count()}})</span>
                                </a>
                            </span>
                        @else
                            <span class="user-login ">
                                <a href="{{route('login')}}">
                                    <i class="fa fa-lock"></i>
                                    <span>ورود / ثبت نام</span>
                                </a>
                            </span>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="mobild_category" id="mobild_category">
        <a class="close_list" onclick="$('.mobild_category').toggle(300)">بازگشت</a>

    </div>

    <div class="header-navigation">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-6 col-sm-7 col-md-9">
                    <div class="header-main-navigation" role="navigation">
                        <div class="shop-main-menu hidden-xs hidden-sm">

                            <ul id="menu-primary-menu-1" class="shop-horizontal-menu main-navigation">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 shop-dropdown-menu">
                                    <a href="{{route('home')}}" style="padding: 0">
                                        <img src="{{ asset('assets/front/image/logo.png') }}" style="height: 46px; ">
                                    </a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 shop-dropdown-menu  main-dropdown-menu">
                                    <a href="{{route('category.index')}}">دسته بندی محصولات </a>
                                    <div class="min_menu">
                                        <div class="head_icon">
                                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                                        </div>
                                        <div class="_body">
                                            @foreach($categories->where('depth', 1) as $category)
                                                <a href="{{route('category', $category->id)}}">{{$category->title}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 shop-dropdown-menu">
                                    <a href="http://turkanipekyolu.com/blog">فرهنگ و اقتصاد</a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 shop-dropdown-menu">
                                    <a href="http://turkanipekyolu.com/b2b">تجارت و بازرگانی</a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 shop-dropdown-menu">
                                    <a href="http://turkanipekyolu.com/service">خدمات فرهنگی و گردشگری </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        function name() {

            let aa = $(".main-dropdown-menu .min_menu ._body");
            return aa;
        }

        $(function () {

            $(".mobild_category").append(name().html());

        });</script>

</header>