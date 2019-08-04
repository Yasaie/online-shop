@extends('front.profile.layout')

@section('body')

    <section class="col-lg-9 left_box app_order">

        <div class="mb-2 title">
            <h2 class="titel_method order_id">سفارش DKC-1137306</h2>
            <span class="order_time">ثبت شده در تاریخ ۲۸ آذر ۱۳۹۲</span>
        </div>


        <div class="method_body info_user row">
            <div class="col-lg-6 item">
                <a class="block name">تحویل گیرنده:</a>
                <a class="block val">پیام یاسایی</a>
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
                <a class="block val">12</a>
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
        <a style="margin-top: 20px;" name="" id="" class="btn btn-success" href="#" role="button">ویرایش اطلاعات تحویل
            گیرنده</a>

        <hr>








            <script>
                $(function(){
                    var level=parseInt($(".route_product").attr("level"));
                    alert(level)
                    $(".level").each( function (indexInArray, valueOfElement) { 
                        alert(indexInArray)
                        if(indexInArray<=level)
                         $("this").removeClass("disactive");
                    });
                    
                });


            </script>



        <div class="method_body route_product" level=6>

        <span class="level disactive">
            <img src="{{asset('assets/front/image/order/user.svg')}}">
            <a>لغو شد</a>
        </span>

            <span class="level_betven disactive">
               <span> <i class="fa fa-check" aria-hidden="true"></i></span>
              
        </span>

            <span class="level disactive">
                <img src="{{ asset('assets/front/image/order/check.svg') }}">
                <a>چک کردن سفارش</a>
        </span>

            <span class="level_betven disactive">
                <span> <i class="fa fa-check" aria-hidden="true"></i></span>
               
         </span>

            <span class="level disactive">
                <img src="{{ asset('assets/front/image/order/prepare.svg') }}">
                    <a>آماده سازی سفارش</a>
        </span>

            <span class="level_betven disactive">
                <span> <i></i></span>
               
         </span>

            <span class="level disactive">
                        <img src="{{ asset('assets/front/image/order/post.svg') }}">
                        <a>ارسال سفارش به پست</a>
                    </span>


            <span class="level_betven disactive">
                            <span> <i></i></span>
                           
                     </span>

            <span class="level disactive">
                    <img src="{{ asset('assets/front/image/order/clinet.svg') }}">
                            <a>تحویل سفارش به مشتری</a>
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


                <tr>
                    <td scope="row">

                        <div class="body">

                            <img class="image_product"
                                 src="https://dkstatics-public.digikala.com/digikala-products/72264.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60">


                            <div>
                                <a><span class="name">نام محصول : </span><br>
                                    کارت شبکه USB بی‌سیم تندا مدل W311M </a>

                                <a><span class="name">ویژگی : </span><br>
                                    گارانتی اصالت و سلامت فیزیکی کالا</a>


                                <a><span class="name">فروشنده : </span><br>
                                    تورکان ایپک یولی</a>


                                <hr class="name_min">
                                <a class="name_min"><span class="name ">تعداد : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name "> قیمت واحد : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">قیمت کل : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    قیمت نهایی</a>


                            </div>

                        </div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                    <td>
                        <div class="body"> ۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">0</div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                </tr>


                <tr>
                    <td scope="row">

                        <div class="body">

                            <img class="image_product"
                                 src="https://dkstatics-public.digikala.com/digikala-products/72264.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60">


                            <div>
                                <a><span class="name">نام محصول : </span><br>
                                    کارت شبکه USB بی‌سیم تندا مدل W311M </a>

                                <a><span class="name">ویژگی : </span><br>
                                    گارانتی اصالت و سلامت فیزیکی کالا</a>


                                <a><span class="name">فروشنده : </span><br>
                                    تورکان ایپک یولی</a>


                                <hr class="name_min">
                                <a class="name_min"><span class="name ">تعداد : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name "> قیمت واحد : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">قیمت کل : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    قیمت نهایی</a>


                            </div>

                        </div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                    <td>
                        <div class="body"> ۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">0</div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                </tr>


                <tr>
                    <td scope="row">

                        <div class="body">

                            <img class="image_product"
                                 src="https://dkstatics-public.digikala.com/digikala-products/72264.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60">


                            <div>
                                <a><span class="name">نام محصول : </span><br>
                                    کارت شبکه USB بی‌سیم تندا مدل W311M </a>

                                <a><span class="name">ویژگی : </span><br>
                                    گارانتی اصالت و سلامت فیزیکی کالا</a>


                                <a><span class="name">فروشنده : </span><br>
                                    تورکان ایپک یولی</a>


                                <hr class="name_min">
                                <a class="name_min"><span class="name ">تعداد : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name "> قیمت واحد : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">قیمت کل : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    قیمت نهایی</a>


                            </div>

                        </div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                    <td>
                        <div class="body"> ۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">0</div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                </tr>


                <tr>
                    <td scope="row">

                        <div class="body">

                            <img class="image_product"
                                 src="https://dkstatics-public.digikala.com/digikala-products/72264.jpg?x-oss-process=image/resize,m_lfit,h_115,w_815/quality,q_60">


                            <div>
                                <a><span class="name">نام محصول : </span><br>
                                    کارت شبکه USB بی‌سیم تندا مدل W311M </a>

                                <a><span class="name">ویژگی : </span><br>
                                    گارانتی اصالت و سلامت فیزیکی کالا</a>


                                <a><span class="name">فروشنده : </span><br>
                                    تورکان ایپک یولی</a>


                                <hr class="name_min">
                                <a class="name_min"><span class="name ">تعداد : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name "> قیمت واحد : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">قیمت کل : </span><br>
                                    ۲۹,۰۰۰ تومان </a>


                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    ۱</a>

                                <a class="name_min"><span class="name ">تخفیف : </span><br>
                                    قیمت نهایی</a>


                            </div>

                        </div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                    <td>
                        <div class="body"> ۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">۲۹,۰۰۰ تومان</div>
                    </td>

                    <td>
                        <div class="body">0</div>
                    </td>


                    <td>
                        <div class="body">1</div>
                    </td>


                </tr>


                </tbody>
            </table>


            <a name="" id="" class="btn btn-success" href="#" role="button" style="
               margin: 40px 20px;
           ">خرید محصول</a>
        </div>


    </section>


@endsection




@section('footer_include')

@endsection