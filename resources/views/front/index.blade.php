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

            <div class="owl-carousel home-large-slider">
                <div><img src="img/slider/1.jpg" /></div>
                <div><img src="img/slider/2.jpg" /></div>
                <div><img src="img/slider/3.jpg" /></div>
            </div>

            <div class="row expanded">
                <div class="colums large-2 small-12">
                    <div class="widget"><img src="img/temp/banner1.jpg" /></div>
                    <div class="widget"><img src="img/temp/banner2.jpg" /></div>
                </div>
                <div class="columns large-10 small-12">
                    <div id="special-offers">
                        <div class="list">
                            <ul>
                                <li class="waves-effect waves-light active" data-name="cheese">پنیر پروسس</li>
                                <li class="waves-effect waves-light" data-name="rice">برنج ایرانی ۱۰ کیلویی</li>
                            </ul>
                        </div>
                        <div class="offer">
                            <div class="title-box">پیشنهاد شگفت‌انگیز</div>
                            <section data-name="cheese">
                                <div class="cover">
                                    <img src="img/temp/cheese.jpg" />
                                </div>
                                <div class="content">
                                    <div>
                                        <span class="title">پنیر پروسس رنده شده کاله ۲۰۰ گرمی</span>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده
                                            شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را
                                            برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                            ایجاد کرد. </p>
                                        <span class="price">۵۰۰۰۰ تومان</span> <span class="discount">۳۰٪ تخفیف</span>
                                        <s>۳۰۰۰۰ تومان</s>
                                    </div>
                                </div>
                            </section>
                            <section data-name="rice">
                                <div class="cover">
                                    <img src="img/temp/cheese.jpg" />
                                </div>
                                <div class="content">
                                    <div>
                                        <span class="title">پنیر پروسس رنده شده کاله ۲۰۰ گرمی</span>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده
                                            شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را
                                            برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                            ایجاد کرد. </p>
                                        <span class="price">۷۰۰۰۰ تومان</span> <span class="discount">۳۰٪ تخفیف</span>
                                        <s>۲۰۰۰۰ تومان</s>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                    <div class="widget">
                        <div class="component">
                            <span class="title">محصولات دسته تکنولوژی</span>
                            <div class="owl-carousel products-slider" data-items="3">
                                <a class="product">
                                    <img src="img/temp/cheese.jpg" />
                                    <h2 class="product-title">محصول شماره ۱</h2>
                                    <div class="price-container">
                                        <span class="offer">۲۵۰۰۰ تومان</span>
                                        <span class="price">۲۰۰۰۰ تومان</span>
                                    </div>
                                    <div class="flex-container" style="margin-top: 8px; justify-content: space-evenly;">
                                        <div class="waves-effect"><i class="la la-cart-plus la-2x"></i></div>
                                        <div>
                                            <div class="product-rate-static" data-rateyo-rating="2.5"></div>
                                        </div>
                                    </div>
                                </a>
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