<header id="header" class="header header-1">

    <div class="header-topbar">
        <div class="container-fluid ">
            <div class="row flex_center">

                <div class="col-lg-4 col-sm-6 col-md-4 text-left left_box-menu">
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

                <form class="col-lg-4 search_box_main">
                    <button type="submit" class="btn_search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <input width="100%" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                </form>

                <div class="col-lg-4 col-sm-6 col-md-8 text-right info_head_left">

                    <div class="topbar-right">

                        @if(Auth::check())
                            <span class="user-login user_popup">

                                    <a href="login"><i class="fa fa-user-o" aria-hidden="true"></i>
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

                                                <a href="{{route('profile')}}" class="method">
                                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                                     <span>پروفایل</span>
                                                </a>

                                                 <a class="method">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span>همه سفارش ها</span>
                                                 </a>

                                                <form action="{{route('logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn-link btn method" style="width: 100%">
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
                                    <span>سبد خرید (4)</span>
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

    <div class="header-navigation">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-6 col-sm-7 col-md-9">
                    <div class="header-main-navigation" role="navigation">
                        <div class="emallshop-main-menu hidden-xs hidden-sm">

                            <ul id="menu-primary-menu-1" class="emallshop-horizontal-menu main-navigation">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 emallshop-dropdown-menu">
                                    <a href="{{route('home')}}" style="padding: 0">
                                        <img src="/asset/image/2016/09/logo.png" style="height: 46px; ">
                                    </a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 emallshop-dropdown-menu  main-dropdown-menu">
                                    <a href="{{route('category.index')}}">دسته بندی محصولات </a>
                                    <div class="min_menu">
                                        <div class="head_icon">
                                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                                        </div>
                                        <div class="_body">
                                            @foreach($category_tree as $category)
                                                <a href="{{route('category', $category->id)}}">{{$category->title}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 emallshop-dropdown-menu">
                                    <a href="http://turkanipekyolu.com/blog">فرهنگ و اقتصاد</a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 emallshop-dropdown-menu">
                                    <a href="http://turkanipekyolu.com/b2b">تجارت و بازرگانی</a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 emallshop-dropdown-menu">
                                    <a href="http://turkanipekyolu.com/service">خدمات فرهنگی و گردشگری </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>