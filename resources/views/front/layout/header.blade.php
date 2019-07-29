<header id="header" class="header header-1">

    <div class="header-topbar">
        <div class="container-fluid ">
            <div class="row flex_center">

                <div class="col-lg-4 col-sm-6 col-md-4 text-left left_box-menu">
                    <div class="customer-support">

                        <div class="customer-support-email">
                            <select onchange="window.location.href = this.value"
                                    class="form-control select_form_con" id="sel1">
                                @foreach($currencies as $currency)
                                <option value="{{route('currency', $currency->key)}}"
                                    {{config('app.current_currency') == $currency ? 'selected' : ''}}>
                                    {{$currency->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="customer-support-call">
                            <select onchange="window.location.href = this.value"
                                    class="form-control select_form_con" id="sel1">
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
                        <span class="user-login ">
                            <a href="cart">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <span>سبد خرید (4)</span>
                            </a>
                        </span>

                        <span class="user-login ">
                            <a href="login">
                                <i class="fa fa-lock"></i>
                                <span>ورود / ثبت نام</span>
                            </a>
                        </span>
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
                                    <img src="/asset/image/2016/09/logo.png" style="height: 46px; ">
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1261 emallshop-dropdown-menu  main-dropdown-menu">
                                    <a href="shop.html">دسته بندی محصولات </a>
                                    <div class="min_menu">
                                        <div class="head_icon">
                                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                                        </div>
                                        <div class="_body">
                                            <a href="#">گوشی موبایل</a>
                                            <a>لوازم جانبی گوشی موبایل</a>
                                            <a>لوازم جانبی تبلت</a>
                                            <a>رهیاب ماهواره‌ای</a>
                                            <a>لپ تاپ و الترابوک</a>
                                            <a>لوازم جانبی لپ تاپ</a>
                                            <a>تجهیزات ذخیره‌سازی اطلاعات</a>
                                            <a>تجهیزات شبکه و ارتباطات</a>
                                            <a>کامپیوترهای All-in-One</a>
                                            <a>کیس های اسمبل شده</a>
                                            <a>کامپیوترهای کوچک</a>
                                            <a>قطعات کامپیوتر</a>
                                            <a>خنک‌ کننده کامپیوتر</a>
                                            <a>نمایشگر (مانیتور)</a>
                                            <a>اسپیکر (بلندگو)</a> <a>گوشی موبایل</a>
                                            <a>لوازم جانبی گوشی موبایل</a>
                                            <a>لوازم جانبی تبلت</a>
                                            <a>رهیاب ماهواره‌ای</a>
                                            <a>لپ تاپ و الترابوک</a>
                                            <a>لوازم جانبی لپ تاپ</a>
                                            <a>تجهیزات ذخیره‌سازی اطلاعات</a>
                                            <a>تجهیزات شبکه و ارتباطات</a>
                                            <a>کامپیوترهای All-in-One</a>
                                            <a>کیس های اسمبل شده</a>
                                            <a>کامپیوترهای کوچک</a>
                                            <a>قطعات کامپیوتر</a>
                                            <a>خنک‌ کننده کامپیوتر</a>
                                            <a>نمایشگر (مانیتور)</a>
                                            <a>اسپیکر (بلندگو)</a>
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