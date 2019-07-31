@extends('front/layout')




@section('content')

<link href="{{ asset('assets/front/css/category.css') }}" rel="stylesheet">


<div class="container-fluid app_filter">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2  filter">

            <div class="f-box">

                <span class="filter_title">
                        <i class="fa fa-align-right" aria-hidden="true"></i>
                        دسته‌بندی نتایج
                </span>

                <ul class="ul">
                    <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                    <a>مد و پوشاک</a></span>


                    <li><a>بچگانه</a></li>
                    <li><a>نوزاد</a></li>
                  
                    <li><a>مردانه</a></li>
                    <li><a>زنانه</a></li>
                    <li><a>ورزشی</a></li>
                    <li><a>صنعتی</a></li>
                </uL>


            </div>




            <div class="f-box">
                 
                        <span class="filter_title">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                جستجو در نتایج
                        </span>
        
                        <form class="filter_search">
                                <i class="fa fa-search icon" aria-hidden="true"></i>
                                <input placeholder="نام محصول مورد نظر را بنویسید" class="search_input">
                        </form>

    
             </div>
    


           
             <div class="f-box">
              
                    <form class="filter_switch">
                            
                                 <label class="switch">
                                    <input type="checkbox" >
                                    <span class="slider round"></span>
                                  </label>
                    
                                  <label class="title_">فقط کالاهای موجود</label>
                    </form>


            </div>


            


            
            <div class="f-box">
              
                    <form class="filter_switch">
                            
                                 <label class="switch">
                                    <input type="checkbox" >
                                    <span class="slider round"></span>
                                  </label>
                    
                                  <label class="title_">فقط کالاهای اصل</label>
                    </form>


            </div>









          <div class="f-box filter_value">

                <span class="filter_title">
                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                        رنگ
                </span>

                <ul>
                    

                        <label class="custom_ch">
                                <input  type="checkbox" checked="checked">
                                <span class="checkmark"></span> همه
                            </label>
                           

                    <label class="custom_ch">
                        <input  type="checkbox">
                        <span class="checkmark"></span> بنفش
                    </label>
                          
                    <label class="custom_ch">
                            <input  type="checkbox" >
                           <span class="checkmark"></span> صورتی
                    </label>
                    

                    <label class="custom_ch">
                            <input  type="checkbox" >
                           <span class="checkmark"></span> سیاه
                    </label>
 

                    <label class="custom_ch">
                            <input  type="checkbox" >
                           <span class="checkmark"></span> بنفش
                    </label>
 
                </uL>


            </div>




        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 result">

            <div class="category_map">
                <a>فروشگاه اینترنتی تورکان ایپک یولی</a> /
                <a>همه محصولات</a> /
                <a>کتاب، لوازم تحریر و هنر</a> /
                <a>تجهیزات استودیویی</a> /
                <a>کارت صدا</a>
                <span class="sort_size">1234 کالا</span>
            </div>

            <div class="result_body">

                <div class="sort">
                        <i class="fa icon fa-sort-amount-asc" aria-hidden="true"></i>
                        <span class="sort_titel">مرتب سازی بر اساس : </span>
                        <a class="sort_name active_sort_name">بیشترین تخفیف</a>
                        <a class="sort_name">ارزان ترین</a>
                        <a class="sort_name">گران ترین</a>
                        <a class="sort_name">پربازدید ترین</a>
                </div>

                <div id="resalts" class="row">

                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                                <a href="#" class="image_box">
                                    <img src="https://dkstatics-public.digikala.com/digikala-products/110261548.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                                </a>
                                <div class="info_box">
                                    <div class="resalt_name"><a href="#">مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                    <div class="resalt_off"><span>٪۳۸</span><del>۳۲۰,۰۰۰</del> </div>
                                    <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                                </div>
                        </div>



                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                                <div class="image_box">
                                    <img src="https://dkstatics-public.digikala.com/digikala-products/4768276.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                                </div>
                                <div class="info_box">
                                    <div class="resalt_name"><a>مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                    <div class="resalt_off"><span>٪۳۸</span><del>۳۲۰,۰۰۰</del> </div>
                                    <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                                </div>
                        </div>



                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                                <div class="image_box">
                                    <img src="https://dkstatics-public-2.digikala.com/digikala-products/111678863.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                                </div>
                                <div class="info_box">
                                    <div class="resalt_name"><a>مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                    <div class="resalt_off"><span>٪۳۸</span><del>۳۲۰,۰۰۰</del> </div>
                                    <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                                </div>
                        </div>



                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                                <div class="image_box">
                                    <img src="https://dkstatics-public.digikala.com/digikala-products/111009520.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                                </div>
                                <div class="info_box">
                                    <div class="resalt_name"><a>مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                    <div class="resalt_off"><span>٪۳۸</span><del>۳۲۰,۰۰۰</del> </div>
                                    <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                                </div>
                        </div>



                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                                <div class="image_box">
                                    <img src="https://dkstatics-public.digikala.com/digikala-products/5411205.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80">
                                </div>
                                <div class="info_box">
                                    <div class="resalt_name"><a>مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                    <div class="resalt_off"><span>٪۳۸</span><del>۳۲۰,۰۰۰</del> </div>
                                    <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                                </div>
                        </div>



                        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt">
                                <a href="#" class="image_box">
                                    <img src="https://dkstatics-public.digikala.com/digikala-products/4104802.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                                </a>
                                <div class="info_box">
                                    <div class="resalt_name"><a href="#">مانتو ورزشی زنانه بیلسی مدل 51W8388-DAL-K.GRI</a></div>
                                    <div class="resalt_off"><span>٪۳۸</span><del>۳۲۰,۰۰۰</del> </div>
                                    <div class="resalt_price"><a>۱۹۷,۰۰۰ <span class="unit">تومان</span></a></div>

                                </div>
                        </div>




                                        


                </div>


                


            </div>
        </div>
    </div>
</div>









@endsection


