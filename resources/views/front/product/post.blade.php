<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه ترکان ایپک یولی</title>
</head>

<body>
    <div id="app">

        <!--Header-->
        <header class="row expanded flex align-middle align-justify" id="header">
            <div class="columns shrink">
                <img src="img/default-logo.png" width="128px" />
            </div>
            <div class="columns shrink">
                <ul id="user-menu">
                    <li><a href="#">دریافت نمایندگی</a></li>
                    <li><a href="#">سوالات متداول</a></li>
                    <li><a href="#">ورود / ثبت نام</a></li>
                </ul>
            </div>
            <div class="columns shrink flex justify-center">
                <form id="search" method="POST" action="#" class="form" onsubmit="return false;">
                    <input type="text" name="keyword" placeholder="نام کالا، برند و یا دسته مورد نظر را جستجو کنید." />
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <div class="columns shrink">
                <div id="cart"><i class="la la-shopping-cart la-3x"></i><span class="badge">۱۰</span></div>
            </div>
        </header>
        <!--Header-->

        <!--Main Menu-->
        <div id="main-menu">
            <ul class="row expanded">
                <li data-name="clothes"><a href="#">مد و پوشاک</a></li>
                <li data-name="home"><a href="#">خانه و آشپزخانه</a></li>
                <li><a href="#">کالا دیجیتال</a></li>
                <li><a href="#">آرایشی، بهداشتی و سلامت</a></li>
                <li><a href="#">کتاب، لوازم تحریر و هنر</a></li>
                <li><a href="#">اسباب بازی، کودک و نوازد</a></li>
                <li><a href="#">ورزش و سفر</a></li>
                <li><a href="#">خوردنی و آشامیدنی</a></li>
                <li><a href="#">خودرو، ابزار و اداری</a></li>
            </ul>
            <div id="pseudo-border-bottom"></div>
            <div id="hover-effect"></div>
        </div>
        <div id="main-menu-sub">
            <section data-name="clothes" style="background-image: url('img/clothes.png');">
                <ul>
                    <li class="main-category"><a href="#">مردانه</a></li>
                    <li><a href="#">تی‌شرت</a></li>
                    <li><a href="#">شلوار</a></li>
                    <li class="main-category"><a href="#">زنانه</a></li>
                    <li><a href="#">تی‌شرت</a></li>
                    <li><a href="#">شلوار</a></li>
                </ul>
                <div class="more"><a href="#">همه دسته بندی‌های مد و پوشاک</a></div>
            </section>
            <section data-name="home" style="background-image: url('img/fridge.jpg');">
                <ul>
                    <li class="main-category"><a href="#">آشپزخانه</a></li>
                    <li><a href="#">اجاق گاز</a></li>
                    <li><a href="#">یخچال</a></li>
                </ul>
                <div class="more"><a href="#">همه دسته بندی‌های خانه و آشپزخانه</a></div>
            </section>
        </div>
        <!--Main Menu-->

        <div id="main-overlay"></div>

        <div id="main-container">

            <div class="row">
                <div class="columns">
                    <div class="widget">
                        <div class="component product">
                            <div class="row">
                                <div class="columns large-4 small-12 text-center">
                                    <div class="product-gallery">
                                        <div class="img-magnifier-container">
                                            <img id="shown" class="shown" />
                                        </div>
                                        <div class="owl-carousel product-gallery-carousel">
                                            <img src="img/temp/rice.jpg" data-show="img/temp/rice.jpg" />
                                            <img src="img/temp/pasta.jpg" data-show="img/temp/pasta.jpg" />
                                            <img src="img/temp/ram.jpg" data-show="img/temp/ram.jpg" />
                                            <img src="img/temp/ram.jpg" data-show="img/temp/ram.jpg" />
                                            <img src="img/temp/ram.jpg" data-show="img/temp/ram.jpg" />
                                            <img src="img/temp/ram.jpg" data-show="img/temp/ram.jpg" />
                                        </div>
                                    </div>
                                </div>
                                <div class="columns large-4 small-12">
                                    <div class="flex-container flex-dir-column" style="height: 100%;">
                                        <div>
                                            <h1 class="title">{{$product->locale('title')}}</h1>
                                            <span style="display: block; margin-bottom: 10px;">
                                                @lang('product.category'):
                                                @foreach($categories as $category)
                                                @if($category)
                                                <a href="/category/{{$category->id}}">{{$category->locale('title')}}</a>
                                                /
                                                @endif
                                                @endforeach
                                                {{$product->locale('title')}}
                                            </span>
                                        </div>
                                        <div style="flex-grow: 1;">
                                            <div class="price-container">
                                                <span class="price">{{number_format($sellers->first()->price)}}
                                                    تومان</span>
                                            </div>
                                            <label>
                                                نوع محصول:
                                                <select class="select2" name="state">
                                                    <option value="AL">Alabama</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div>
                                            <div class="number-field">
                                                <button class="button" data-decrease>-</button>
                                                <input type="text" name="number" value="1" data-min="1"
                                                    data-max="{{$sellers->first()->amount}}" />
                                                <button class="button" data-increase>+</button>
                                            </div>
                                            <button class="button buy expanded"><i class="la la-cart-plus la-2x"></i>
                                                افزودن
                                                به
                                                سبد خرید</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns large-4 small-12">
                                    <div class="attrs">
                                        <span class="title">@lang('product.specification')</span>
                                        <ul class="attrs">
                                            @foreach($product_specs->slice(0, 5) as $spec)
                                            <li>{{$spec->specs()->first()->locale('title')}}: {{$spec->locale('title')}}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="tabs">
                            <ul class="tabs-list">
                                <li class="active" data-tab="details">@lang('product.specification')</li>
                                <li data-tab="description">@lang('product.description')</li>
                                <li data-tab="comments">@lang('product.comments')</li>
                            </ul>
                            <div class="sections">
                                <section data-tab="details">
                                    <h4>@lang('product.specification')</h4>
                                    <table>
                                        @foreach($product_specs as $spec)
                                        <tr>
                                            <td>{{$spec->specs()->first()->locale('title')}}</td>
                                            <td>{{$spec->locale('title')}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </section>
                                <section data-tab="description">
                                    <h4>@lang('product.description')</h4>
                                    <p>
                                        {{$product->locale('description')}}
                                    </p>
                                </section>
                                <section data-tab="comments">
                                    <h4>@lang('product.comments')</h4>
                                    <div class="comments">
                                        @foreach($comments as $comment)
                                        @php $user = $comment->user()->first() @endphp
                                        <div class="comment">
                                            <div class="row">
                                                <div class="columns shrink">
                                                    <img src="img/temp/pasta.jpg" class="profile-pic" />
                                                </div>
                                                <div class="columns">
                                                    <div class="author">@lang('product.comment_by', ['name' => "{$user->first_name} {$user->last_name}"])</div>
                                                    {{$comment->body}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <footer>
            <a href="#header" class="go-up"><i class="la la-arrow-up"></i></a>
            <div class="row large-up-4 medium-up-2 small-up-1">
                <div class="columns">
                    <span class="section-title">درباره‌ما</span>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                        درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                    </p>
                </div>
                <div class="columns">
                    <span class="section-title">لینک‌ها</span>
                    <ul>
                        <li><a href="#">لینک</a></li>
                        <li><a href="#">لینک</a></li>
                        <li><a href="#">لینک</a></li>
                        <li><a href="#">لینک</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <span class="section-title">لینک‌ها</span>
                    <ul>
                        <li><a href="#">لینک</a></li>
                        <li><a href="#">لینک</a></li>
                        <li><a href="#">لینک</a></li>
                        <li><a href="#">لینک</a></li>
                    </ul>
                </div>
                <div class="columns text-center">
                    <img src="img/namad.jpg" />
                </div>
            </div>
        </footer>

        <div class="copyright">تمامی حقوق محفوظ و مربوط به این وبسایت می‌باشد. &copy; ۲۰۱۹ - طراحی شده توسط شرکت <a
                href="http://ttbz.ir/" target="_blank">تحلیلگران (شماره ثبت: ۲۵۸۰۸)</a></a></div>

    </div>

    <!--Webpack Bundle-->
    <script src="/bundles/bundle.js"></script>
    <!--Webpack Bundle-->
</body>

</html>