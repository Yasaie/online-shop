@extends('front.layout')


@section('content')


<script src="asset/plugin/zoom-master/jquery.zoom.min.js"></script>


<script>


function load_image(url_image){

$("#main_image_product").attr("src", url_image);


$('#ex1').zoom();

setTimeout(() => {
    $('#ex1').zoom();

}, 1000);


setTimeout(() => {
    $('#ex1').zoom();

}, 1000);

}






$(function(){
    $('#ex1').zoom();



    

$(".im").click(function (e) { 
   
    load_image($(e.target).attr("src_big"));
});



});
</script>






















  
  <!-- Modal -->
  <div class="modal fade" id="comment_star" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
        <div style="text-align: center" class="modal-body">

            <div number_of_star=1 style="display: inline-block" id="rateYo_set_comment_star">
            </div>

        </div>
      
      </div>
    </div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="mod_login_war" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
        <div class="modal-body">
            <h3 style="
            text-align: center;
            padding-top:  17px;
            font-weight: normal;
            font-size: 16px;
        ">برای ثبت دیدگاه لطفا وارد اکانت خود شوید</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">تایید</button>
        </div>
      </div>
    </div>
  </div>











<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>






<script> 


$(function () {
 

$(".rateYo_saler").each(function (indexInArray, valueOfElement) { 
     

    $(this).rateYo({
   rating: parseFloat($(this).attr("number_of_star")),
       readOnly: true,
   starWidth: "15px",
   ratedFill:"#ffd700"
 })

});



$("#rateYo_set_comment_star").rateYo({
   rating: parseFloat($("#rateYo_set_comment_star").attr("number_of_star")),
   starWidth: "50px",
   ratedFill:"#ffd700",
   fullStar: true,
   onSet: function (rating, rateYoInstance) {
 
//  $.ajax({
//      type: "get",
//      url: "product.html",
//      data: "data",
//      dataType: "dataType",
//      success: function (response) {
//          alert()
//       
//      }
//  });


$.ajax({
  url: "product.html",
  context: document.body
}).done(function(data) {

    $('#comment_star').modal('hide');
});


  }


 });


 $("#rateYo_product").rateYo({
   rating: parseFloat($("#rateYo_product").attr("number_of_star")),
       readOnly: true,
   starWidth: "30px",
   ratedFill:"#ffd700"


 });

});







</script>







<div class="container-fluid">
    <div class="row product_main_box">


        <div class="col-lg-4 col-md-6 img_box_product">
            
            <div class="image_main" id='ex1' >
                <img id="main_image_product" src="https://dkstatics-public.digikala.com/digikala-products/3524840.jpg?x-oss-process=image/resize,h_900/quality,q_80">
            </div>


            <div class="mini_img_box">
                <a  class="im" src_big="https://dkstatics-public-2.digikala.com/digikala-products/111469811.jpg?x-oss-process=image/resize,h_1000/quality,q_80" ><img src="https://dkstatics-public-2.digikala.com/digikala-products/111469811.jpg?x-oss-process=image/resize,h_800/quality,q_80">
                </a>
                <a  class="im" src_big="https://dkstatics-public-2.digikala.com/digikala-products/111106658.jpg?x-oss-process=image/resize,h_1000/quality,q_80" ><img src="https://dkstatics-public-2.digikala.com/digikala-products/111106658.jpg?x-oss-process=image/resize,h_800/quality,q_80">
                </a>

                <a  class="im" src_big="https://dkstatics-public.digikala.com/digikala-products/458112.jpg?x-oss-process=image/resize,h_1000/quality,q_80" ><img src="https://dkstatics-public.digikala.com/digikala-products/458112.jpg?x-oss-process=image/resize,h_800/quality,q_80">
                </a>

                <a  class="im" src_big="https://dkstatics-public.digikala.com/digikala-products/4884425.jpg?x-oss-process=image/resize,h_1000/quality,q_80" ><img src="https://dkstatics-public.digikala.com/digikala-products/4884425.jpg?x-oss-process=image/resize,h_800/quality,q_80">
                </a>

                <a  class="im" src_big="https://dkstatics-public.digikala.com/digikala-products/66076.jpg?x-oss-process=image/resize,h_1000/quality,q_80" ><img src="https://dkstatics-public.digikala.com/digikala-products/66076.jpg?x-oss-process=image/resize,h_800/quality,q_80">
                </a>

                
                
            </div>


        </div>





        <div class="col-lg-4 col-md-6 info_box_product detail">
           
            <h2  class="name_product">دسر پانا کوتا کاله مقدار 1000 میلی لیتر</h2>
            
            <div class="category_product" > دسته بندی : <a >خوراکی</a></div>
           
            <div style="margin-top: 10px" id="rateYo_product" number_of_star="3"></div>
            <div class="category_product  small" id="add_star_btn" >  <a >ثبت ستاره به محصول</a></div>


            <ul class="property_list">
                <span  class="titlee"> ویژگی محصول</span>
                <li class="product_property">
                    <span class="titel_property">رنگ : </span>
                    <span class="value_property">مشکی</span>
                </li>

                <li class="product_property">
                    <span class="titel_property">جیب : </span>
                    <span class="value_property">ندارد</span>
                </li>

                <li class="product_property">
                    <span class="titel_property">فرم یقه : </span>
                    <span class="value_property">گرد</span>
                </li>

                <li class="product_property">
                    <span class="titel_property">آستین : </span>
                    <span class="value_property">کوتاه</span>
                </li>
              
                
               
              
            </ul>
        </div>
     


        <div class="col-lg-4 col-md-12 saler_box_product">

            <div class="parent" >
            


                    <div class="list_item" >
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                              <span class="titel_item">  فروشنده :  </span>
                              <span class="val_item">یاس</span>
                              <div style="margin-top: 10px" class="rateYo_saler" number_of_star="4.4"></div>
                    </div>
               


                  <div class="list_item" >
                            <i class="fa fa-share" aria-hidden="true"></i>  
                        <span class="titel_item">  تعداد فروش :  </span>
                        <span class="val_item">32</span>
                  </div>




                 <div class="money_product list_item">
                     <div style="margin-bottom: 10px;">
                        <span class="value is_off">۲۹,۵۰۰</span>
                        <span class="unit is_PR">20%</span>
                     </div>

                     <div>
                            <span class="value ">۲۹,۵۰۰</span>
                            <span class="unit">تومان</span>
                    </div>
                 </div>


                 <div class="list_item by_btn" >
                     <a>افزودن به سبد خرید   <span class="shadow"></span> </a>

                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                      
                 </div>

                 <div class="list_item sho_more" >
                    <a class="right">1 فروشنده دیگر این کالا</a>
                    <a href="#salers_main_box-titel" id="show-salers_main_box" onclick="remove_salers_main_box_mobile()"  class="left">مشاهده </a>
                 </div>
            
            
            
          



            </div>

        </div>




    </div>

    <div class="row salers_main_box">
        <h3 id="salers_main_box-titel" class="col-md-12 title_">
                لیست فروشنده
        </h3>
    </div>

    <div class="row salers_main_box_mobile">

        <span onclick="remove_salers_main_box_mobile()" id="exit-salers_main_box_mobile">بازگشت</span>




        <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         <div class="saler_list ">
                <span  class="col-md-12 list_salers">
                     <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     <a class="name_of_saler">ساعت برنارد  </a><br>
                    <div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
                </span>

                <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
               <div>
                         <span  class="money_mob"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
                         <span  class="btn_add_to_bag"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
                </div>
        </div>
         
         
         
         
         
             
             
             
                 
                                                     
                                                     
                                                     
                                                                                                                                                                                                                                                                                                                                                                                    


    </div>












    <div class="row salers_main_box list_saler">
         

         <span  class="col-md-3 list_salers"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
         <a class="name_of_saler">ساعت برنارد  </a>
         <a class="point">
                <div style="margin-top: 10px" class="rateYo_saler" number_of_star="5"></div>

         </a>
         </span>

        <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
        <span  class="col-md-3 list_salers"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
        <span  class="col-md-3 list_salers"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
        

    </div>





    <div>
    
    <div class="row salers_main_box list_saler">
         

        <span  class="col-md-3 list_salers"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <a class="name_of_saler">ساعت برنارد  </a>
        <a class="point"><div style="margin-top: 10px" class="rateYo_saler" number_of_star="2"></div>
        </a>
        </span>

       <span  class="col-md-3 list_salers"> <i class="fa fa-pie-chart" aria-hidden="true"></i> سرویس ویژه ترکان: ۷ روز تضمین بازگشت کالا </span>
       <span  class="col-md-3 list_salers"><a class="money_"> <span class="unit"> ۲۹,۵۰۰ </span>تومان </a> </span>
       <span  class="col-md-3 list_salers"> <a class="btn_add_to">افزودن به سبد خرید</a></span>
       

   </div>



   <div class="row btn_show_info_product">
    

        <div class="col-lg-2 col-md-3 col-xs-4 parent_m_btn"  id="info_productt_b"><i class="fa fa-info" aria-hidden="true"></i><a  class="m_btn"> توضیحات </a></div>
        <div class="col-lg-2 col-md-3 col-xs-4 parent_m_btn"  id="sp_productt_b"> <i class="fa fa-bar-chart" aria-hidden="true"></i> <a  class="m_btn">مشخصات</a></div>
        <div class="col-lg-2 col-md-3 col-xs-4 parent_m_btn  parent_m_btn_active" id="comment_productt_b"> <i class="fa fa-comments-o" aria-hidden="true"></i><a   class="m_btn ">نظرات</a></div>

    </div>

  
  
    <div   class="row body_info" id="info_productt">
       <div class="col-lg-12 titel_info" >
           <h2>نقد و بررسی اجمالی</h2>
           <span>Shielder SH9090 Ston Cutting Angel Grinder</span>
       </div>
       <div class="col-lg-2 image_box">
        <img src="https://www.digikala.com/static/files/025314f5.svg" alt="">
       </div>

       <div class="col-lg-10 ">
            <p class="p_info">
                    فرز برقی وسیله‌ای است که با چرخاندن دورانی سریع انواع دیسک‌های برش، سایش و یا پولیش دهنده؛ جهت برش، سایش و یا پرداخت فلزات و یا سایر قطعات استفاده می‌شود. فرزها دارای یک موتور برقی هستند که با ایجاد میدان مغناطیسی، دنده‌ها را به چرخش در می‌آورند و در نتیجه دیسک نصب شده بر روی شفت دنده نیز به چرخش در می‌آید تا عملیات فرزکاری انجام شود.« مینی فرز شیلدر مدل SH9090 » با چرخاندن دیسک تا 1100 دور در دقیقه عمدتا جهت برش و یا سایش قطعات فلزی و غیره استفاده می‌شود. این دستگاه دارای قدرت 900 وات است تا عملیات فرزکاری پرتوان انجام شود. سایز دیسک قابل نصب بر روی این دستگاه 115 میلی‌متر هست. یک عدد دیسک برش و یک عدد دیسک سایش با کیفیت به ترتیب در سایزهای  3×115 و 6×115 میلی‌متر نیز به همراه این دستگاه عرضه می‌شود. هم‌چنین این دستگاه دارای قاب محافظ جهت جلوگیری از پاشش جرقه و یا براده به سمت کاربر است تا ایمنی استفاده از این دستگاه به حداکثر برسد. البته استفاده از عینک محافظ در حین کار با این دستگاه هم‌چنان توصیه می‌شود. تمامی مراحل ساخت موتور این دستگاه از قبیل آرمیچر و بالشتک‌های صنعتی و بادوام طبق آخرین استاندارد اروپا  CE تولید شده تا عمر مفید دستگاه به حداکثر برسد. هم‌چنین با اعمال عملیات گرمایشی استاندارد و سخت کاری بر روی دنده‌های این دستگاه فرز، همواره سعی شده تا دنده‌ها تقویت شده و عمر دنده‌ها افزایش یابد. بدنه و دسته این دستگاه دارای طراحی ارگونومیک جهت خوش‌دستی و راحتی کاربر در حین کار است. این فرز مجهز به سیستم قفل‌کن اتوماتیک جهت سهولت تعویض صفحه سنگ بوده. این دستگاه دارای دسته جانبی و قابل نصب در جهت سمت راست و یا سمت چپ دستگاه هست تا کاربرهای چپ دست و راست دست بر اساس سلیقه خود این دسته جانبی را نصب نموده و از آن هنگام کار استفاده نمایند. همچنین این دستگاه قابلیت تعویض زغال مصرفی دستگاه از روی پوسته را است  و شامل گارانتی 18 ماهه شرکت شیلدر بوده.

            </p>
           </div>

   </div>
   
   <div  class="row body_comments" id="comment_productt">
        
    
        <div class="col-lg-12 titel_comments" >
          <i class="fa fa-comments-o" aria-hidden="true"></i>
          نظرات کاربران
          (<span>12</span>)
        </div>






        <form class="disable_form" action="" method="GET"  style="margin: 40px 0px">
            
            
            
            <div   class="form-group  col-lg-5 col-md-7 col-sm-9 col-xs-12">
             
             
            <input  style="margin: 10px;"  disabled type="text" class="form-control link_f" id="link_f" name="title" id="title" aria-describedby="helpId" placeholder="عنوان ">

              <textarea style="margin: 10px; min-height: 200px"  name="comment" disabled placeholder="نظرات خود را وارد کنید"  style="min-height: 200px" class="form-control link_f"  id="exampleFormControlTextarea1" rows="3"></textarea>
                
              <input disabled style="margin: 10px;" name="sub"  class="btn link_f btn-success" type="submit" value="ارسال دیدگاه">
           
           
            </div>

          </form>



















        <div class="main_comments  col-lg-5 col-md-7 col-sm-9 col-xs-12">
            <div class="header_coment">
                <h4 style="display: inline-block">قدرت مند</h4></div>
            <div class="body_coment">
                    فرز خوبی بنظر میاد از نقاط قوت ان کلید پاور ان است که در صورت خطر با یک اشاره انگشت شست فرز را خاموش می کند اما در زمان روشن کردن همین کلید بد جا میرود .نسبت به قیمتش واقعا ارزش دارد.وزنش کمی سنگین است و اگر مواظب نباشید ممکن است در حین کار صدمه ببینید برای افراد اماتور مناسب نیست اما کارکرد خوبی دارد.یک نکته مبهم هم دارد روی کارتن فرز نوشته سرعت11000 دور در دقیقه اما روی خود فرز نوشته1100 دور که بنظر اشتباه نوشتن.به هر حال من راضی ام.


            </div>

            <div class="footer_coment">
                    <div class="user_info">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            پیام یاسایی
                    </div>

                    <div class="date_info">
                            در تاریخ 21 فروردین ۱۳۹۸
                    </div>


            </div>

        </div>


        <div class="main_comments  col-lg-5 col-md-7 col-sm-9 col-xs-12">
                <div class="header_coment">
                    <h4 style="display: inline-block">از هر نظر عالی هستش خیلی هم خوش دسته </h4></div>
                <div class="body_coment">
                        من این مینی فرز رو بعد از خوندن نظرات دوستان خریدم. در نگاه اول، کیفیت ساخت و ظاهر مناسبش مشخص هست. قدرت خیلی خوبی داره و در زمان روشن موندن نسبتا طولانی، آنچنان داغ نمیکنه. یه نکته مثبتش سایز صفحه 115 هست که همه جا پیدا میشه. فقط طول سیمش کوتاهه که حتما باید از رابط استفاده کنید. بنظر من یکم صداش زیاده که شاید عادی باشه. اما لرزش خیلی کمی حین کار کردن داره. کلیدش هم اون جور که میگفتن بد جا نمیره . دو حالت داره. با فشار اول بصورت موقتی تا دستتون رو کلیده کار میکنه. اما با فشار دادن بیشتر، کلید قفل میشه و بصورت مداوم کار میکنه. واسه خاموش کردنش هم کمی انتهای کلید رو فشار بدید سریعا آزاد میشه. تو بقیه فرز ها هم همینطوره.
                        خلاصه تا اینجا که واسم خوب کار کرده. امیدوارم دوام هم داشته باشه.
                </div>
    
                <div class="footer_coment">
                        <div class="user_info">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                علیرضا راستین
                        </div>
    
                        <div class="date_info">
                                  در تاریخ ۱۷ فروردین ۱۳۹۸

                        </div>
    
    
                </div>
    
            </div>
    
    
    


   </div>


   <div class="row body_specifications" id="sp_productt">
        
        <div class="col-lg-12 title_sp" >  مشخصات فنی</div>




        <div class="sp_item col-lg-12 row">

                     <h4 class="col-lg-12  title_sp_min">مشخصات کلی                </h4>
            
                    <div  class="col-lg-12 ">
                        <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">نوع</span>
                        <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12  sp_val">مینی فرز</span>
                    </div>   
                    
                     <div  class="col-lg-12 ">
                    <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">ابعاد</span>
                    <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12 sp_val">مینی فرز</span>
                    </div>   
        

                   <div  class="col-lg-12 ">
                        <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">وزن</span>
                        <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12 sp_val">مینی فرز</span>
                    </div>   




                    <div  class="col-lg-12 ">
                            <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">رنگ</span>
                            <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12 sp_val">مینی فرز</span>
                    </div>   
        </div>







        <div class="sp_item col-lg-12 row">

                <h4 class="col-lg-12  title_sp_min">مشخصات کلی                </h4>
       
               <div  class="col-lg-12 ">
                   <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">نوع</span>
                   <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12  sp_val">مینی فرز</span>
               </div>   
               
                <div  class="col-lg-12 ">
               <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">ابعاد</span>
               <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12 sp_val">مینی فرز</span>
               </div>   
   

              <div  class="col-lg-12 ">
                   <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">وزن</span>
                   <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12 sp_val">مینی فرز</span>
               </div>   




               <div  class="col-lg-12 ">
                       <span class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">رنگ</span>
                       <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12 sp_val">مینی فرز</span>
               </div>   
   </div>














   </div>





    </div>









<script>





function remove_salers_main_box_mobile(){

    if(parseFloat(jQuery("html").width())<900){
        jQuery(".salers_main_box_mobile").toggle(200);
         }


}







    
jQuery(function(){


// 

$("#add_star_btn").click(function (e) { 
    e.preventDefault();
    $('#comment_star').modal({show:true})
    
});







 
    $(".disable_form").click(function (e) { 
        e.preventDefault();
        
        
        $('#mod_login_war').modal({show:true})

         });








    jQuery("#sp_productt_b").removeClass("parent_m_btn_active");
        jQuery("#info_productt_b").addClass("parent_m_btn_active");
        jQuery("#comment_productt_b").removeClass("parent_m_btn_active");
      

        jQuery("#info_productt").show(400);
        jQuery("#comment_productt").hide(400);
        jQuery("#sp_productt").hide(400);






    jQuery("#sp_productt_b").click(function (e) { 
       

        jQuery("#sp_productt_b").addClass("parent_m_btn_active");
        jQuery("#info_productt_b").removeClass("parent_m_btn_active");
        jQuery("#comment_productt_b").removeClass("parent_m_btn_active");
      
        jQuery("#info_productt").hide(400);
        jQuery("#comment_productt").hide(400);
        jQuery("#sp_productt").show(400);
        
    });

    jQuery("#info_productt_b").click(function (e) { 
        jQuery("#sp_productt_b").removeClass("parent_m_btn_active");
        jQuery("#info_productt_b").addClass("parent_m_btn_active");
        jQuery("#comment_productt_b").removeClass("parent_m_btn_active");
      

        jQuery("#info_productt").show(400);
        jQuery("#comment_productt").hide(400);
        jQuery("#sp_productt").hide(400);
        
    });

    jQuery("#comment_productt_b").click(function (e) { 
        jQuery("#sp_productt_b").removeClass("parent_m_btn_active");
        jQuery("#info_productt_b").removeClass("parent_m_btn_active");
        jQuery("#comment_productt_b").addClass("parent_m_btn_active");
      

        jQuery("#info_productt").hide(400);
        jQuery("#comment_productt").show(400);
        jQuery("#sp_productt").hide(400);
        
    });




});











jQuery(function(){

    jQuery("#add_from").addClass("colm_edit");

});

</script>

   <div id="add_from" class=" wpb_column vc_column_container vc_col-sm-12 vc_col-lg-9 vc_col-md-12 vc_col-xs-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">

                    <div class="vc_row wpb_row vc_inner vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_single_image wpb_content_element vc_align_center   banner-shadow">
        
                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                    <img width="590" height="190" src="asset/image/2016/09/61142ab7.jpg" class="vc_single_image-img attachment-full" alt=""></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_single_image wpb_content_element vc_align_center   banner-shadow">
        
                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                    <img width="590" height="190" src="asset/image/2016/09/9ab5c5bb.jpg" class="vc_single_image-img attachment-full" alt=""></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div id="section-5d2584217b22b" class="product-section products_carousel recent-products">
                                    <div class="section-header">
                                        <div class="section-title">
                                            <h3>محصولات مرتبط</h3>
                                        </div>
                                    </div>
                                    <div class="section-content woocommerce">

                                        <div class="product-items">

                                            <ul class="products product-style1 product-carousel owl-carousel" data-navigation="0" data-pagination="0">
                                               
                                                   

                                                    <li class="slide-row">
                                                            <ul>
                                                                <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                                        <div class="product-entry">
                                                                                                                                            
                                                                                <div class="product-image product-image-style2">
                                                                                    <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                        <div class="product-highlight ">
                                                            
                                                                                        </div>
                                                                                        <img width="300" height="354" src="asset/image/product/1.jpg" class="front-image wp-post-image" alt="">
                                                                                        <img width="300" height="354" src="asset/image/product/11.jpg" class="back-image" alt="">
                                                                                    </a>
                                                            
                                                                                    <div class="product-buttons">
                                                            
                                                                                        
                                                            
                                                                                        <div class="clear">
                                                                                        </div>
                                                                                        
                                                                                        
                                                                                    </div>
                                                            
                                                                                </div>
                                                            
                                                                                <div class="product-content">
                                                            
                                                                                    <div class="product-title-rating">
                                                                                        <a class="product-title" href="product.html">
                                                                                            <h3>
                                                                                                موبایل ۱
                                                                                            </h3>
                                                                                        </a>
                                                            
                                                                                    </div>
                                                                                    <div class="short-description">
                                                                                       
                                                                                        <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                    </div>
                                                                                    <div class="product-loop-price">
                                                                                        <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                        </span>
                                                            
                                                                                    </div>
                                                                                    <div class="product-buttons">
                                                                                        <div class="product-cart">
                                                                                            <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                گزینه&zwnj;ها</a>
                                                                                        </div>
                                                            
                                                                                        
                                                            
                                                                                        <div class="clear">
                                                                                        </div>
                                                                                        
                                                                                        
                                                                                    </div>
                                                            
                                                                                    
                                                            
                                                                                </div>
                                                                            </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                                </li>
                                                            </ul>
                                                        </li>


                                                     <li class="slide-row">
                                                                <ul>
                                                                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                                            <div class="product-entry">
                                                                                                                                                
                                                                                    <div class="product-image product-image-style2">
                                                                                        <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                            <div class="product-highlight ">
                                                                
                                                                                            </div>
                                                                                            <img width="300" height="354" src="asset/image/product/2.jpg" class="front-image wp-post-image" alt="">
                                                                                            <img width="300" height="354" src="asset/image/product/22.jpg" class="back-image" alt="">
                                                                                        </a>
                                                                
                                                                                        <div class="product-buttons">
                                                                
                                                                                            
                                                                
                                                                                            <div class="clear">
                                                                                            </div>
                                                                                            
                                                                                            
                                                                                        </div>
                                                                
                                                                                    </div>
                                                                
                                                                                    <div class="product-content">
                                                                
                                                                                        <div class="product-title-rating">
                                                                                            <a class="product-title" href="product.html">
                                                                                                <h3>
                                                                                                    موبایل ۱
                                                                                                </h3>
                                                                                            </a>
                                                                
                                                                                        </div>
                                                                                        <div class="short-description">
                                                                                           
                                                                                            <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                        </div>
                                                                                        <div class="product-loop-price">
                                                                                            <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                            </span>
                                                                
                                                                                        </div>
                                                                                        <div class="product-buttons">
                                                                                            <div class="product-cart">
                                                                                                <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                    گزینه&zwnj;ها</a>
                                                                                            </div>
                                                                
                                                                                            
                                                                
                                                                                            <div class="clear">
                                                                                            </div>
                                                                                            
                                                                                            
                                                                                        </div>
                                                                
                                                                                        
                                                                
                                                                                    </div>
                                                                                </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                                    </li>
                                                                </ul>
                                                            </li>


                                                    <li class="slide-row">
                                                                    <ul>
                                                                        <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                                                <div class="product-entry">
                                                                                                                                                    
                                                                                        <div class="product-image product-image-style2">
                                                                                            <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                                <div class="product-highlight ">
                                                                    
                                                                                                </div>
                                                                                                <img width="300" height="354" src="asset/image/product/1.jpg" class="front-image wp-post-image" alt="">
                                                                                                <img width="300" height="354" src="asset/image/product/11.jpg" class="back-image" alt="">
                                                                                            </a>
                                                                    
                                                                                            <div class="product-buttons">
                                                                    
                                                                                                
                                                                    
                                                                                                <div class="clear">
                                                                                                </div>
                                                                                                
                                                                                                
                                                                                            </div>
                                                                    
                                                                                        </div>
                                                                    
                                                                                        <div class="product-content">
                                                                    
                                                                                            <div class="product-title-rating">
                                                                                                <a class="product-title" href="product.html">
                                                                                                    <h3>
                                                                                                        موبایل ۱
                                                                                                    </h3>
                                                                                                </a>
                                                                    
                                                                                            </div>
                                                                                            <div class="short-description">
                                                                                               
                                                                                                <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                            </div>
                                                                                            <div class="product-loop-price">
                                                                                                <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                                </span>
                                                                    
                                                                                            </div>
                                                                                            <div class="product-buttons">
                                                                                                <div class="product-cart">
                                                                                                    <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                        گزینه&zwnj;ها</a>
                                                                                                </div>
                                                                    
                                                                                                
                                                                    
                                                                                                <div class="clear">
                                                                                                </div>
                                                                                                
                                                                                                
                                                                                            </div>
                                                                    
                                                                                            
                                                                    
                                                                                        </div>
                                                                                    </div>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                                        </li>
                                                                    </ul>
                                                                </li>


                                                    <li class="slide-row">
                                                                        <ul>
                                                                            <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                                    <div class="product-entry">
                                                                                                                                                        
                                                                                            <div class="product-image product-image-style2">
                                                                                                <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                                    <div class="product-highlight ">
                                                                        
                                                                                                    </div>
                                                                                                    <img width="300" height="354" src="asset/image/product/3.jpg" class="front-image wp-post-image" alt="">
                                                                                                    <img width="300" height="354" src="asset/image/product/33.jpg" class="back-image" alt="">
                                                                                                </a>
                                                                        
                                                                                                <div class="product-buttons">
                                                                        
                                                                                                    
                                                                        
                                                                                                    <div class="clear">
                                                                                                    </div>
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                        
                                                                                            </div>
                                                                        
                                                                                            <div class="product-content">
                                                                        
                                                                                                <div class="product-title-rating">
                                                                                                    <a class="product-title" href="product.html">
                                                                                                        <h3>
                                                                                                            موبایل ۱
                                                                                                        </h3>
                                                                                                    </a>
                                                                        
                                                                                                </div>
                                                                                                <div class="short-description">
                                                                                                   
                                                                                                    <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                                </div>
                                                                                                <div class="product-loop-price">
                                                                                                    <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                                    </span>
                                                                        
                                                                                                </div>
                                                                                                <div class="product-buttons">
                                                                                                    <div class="product-cart">
                                                                                                        <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                            گزینه&zwnj;ها</a>
                                                                                                    </div>
                                                                        
                                                                                                    
                                                                        
                                                                                                    <div class="clear">
                                                                                                    </div>
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                        
                                                                                                
                                                                        
                                                                                            </div>
                                                                                        </div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                            </li>
                                                                        </ul>
                                                    </li>


                                                  <li class="slide-row">
                                                                            <ul>
                                                                                <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                                        <div class="product-entry">
                                                                                                                                                            
                                                                                                <div class="product-image product-image-style2">
                                                                                                    <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                                        <div class="product-highlight ">
                                                                            
                                                                                                        </div>
                                                                                                        <img width="300" height="354" src="asset/image/product/4.jpg" class="front-image wp-post-image" alt="">
                                                                                                        <img width="300" height="354" src="asset/image/product/44.jpg" class="back-image" alt="">
                                                                                                    </a>
                                                                            
                                                                                                    <div class="product-buttons">
                                                                            
                                                                                                        
                                                                            
                                                                                                        <div class="clear">
                                                                                                        </div>
                                                                                                        
                                                                                                        
                                                                                                    </div>
                                                                            
                                                                                                </div>
                                                                            
                                                                                                <div class="product-content">
                                                                            
                                                                                                    <div class="product-title-rating">
                                                                                                        <a class="product-title" href="product.html">
                                                                                                            <h3>
                                                                                                                موبایل ۱
                                                                                                            </h3>
                                                                                                        </a>
                                                                            
                                                                                                    </div>
                                                                                                    <div class="short-description">
                                                                                                       
                                                                                                        <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                                    </div>
                                                                                                    <div class="product-loop-price">
                                                                                                        <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                                        </span>
                                                                            
                                                                                                    </div>
                                                                                                    <div class="product-buttons">
                                                                                                        <div class="product-cart">
                                                                                                            <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                                گزینه&zwnj;ها</a>
                                                                                                        </div>
                                                                            
                                                                                                        
                                                                            
                                                                                                        <div class="clear">
                                                                                                        </div>
                                                                                                        
                                                                                                        
                                                                                                    </div>
                                                                            
                                                                                                    
                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                                </li>
                                                                            </ul>
                                                   </li>


                                                    <li class="slide-row">
                                                                                <ul>
                                                                                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                                            <div class="product-entry">
                                                                                                                                                                
                                                                                                    <div class="product-image product-image-style2">
                                                                                                        <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                                            <div class="product-highlight ">
                                                                                
                                                                                                            </div>
                                                                                                            <img width="300" height="354" src="asset/image/product/1.jpg" class="front-image wp-post-image" alt="">
                                                                                                            <img width="300" height="354" src="asset/image/product/11.jpg" class="back-image" alt="">
                                                                                                        </a>
                                                                                
                                                                                                        <div class="product-buttons">
                                                                                
                                                                                                            
                                                                                
                                                                                                            <div class="clear">
                                                                                                            </div>
                                                                                                            
                                                                                                            
                                                                                                        </div>
                                                                                
                                                                                                    </div>
                                                                                
                                                                                                    <div class="product-content">
                                                                                
                                                                                                        <div class="product-title-rating">
                                                                                                            <a class="product-title" href="product.html">
                                                                                                                <h3>
                                                                                                                    موبایل ۱
                                                                                                                </h3>
                                                                                                            </a>
                                                                                
                                                                                                        </div>
                                                                                                        <div class="short-description">
                                                                                                           
                                                                                                            <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                                        </div>
                                                                                                        <div class="product-loop-price">
                                                                                                            <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                                            </span>
                                                                                
                                                                                                        </div>
                                                                                                        <div class="product-buttons">
                                                                                                            <div class="product-cart">
                                                                                                                <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                                    گزینه&zwnj;ها</a>
                                                                                                            </div>
                                                                                
                                                                                                            
                                                                                
                                                                                                            <div class="clear">
                                                                                                            </div>
                                                                                                            
                                                                                                            
                                                                                                        </div>
                                                                                
                                                                                                        
                                                                                
                                                                                                    </div>
                                                                                                </div>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                                    </li>
                                                                                </ul>
                                                    </li>


                                                    <li class="slide-row">
                                                                                    <ul>
                                                                                        <li class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product type-product post-979 status-publish first instock product_cat-93 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-variable" data-postid="post-979">
                                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                                                <div class="product-entry">
                                                                                                                                                                    
                                                                                                        <div class="product-image product-image-style2">
                                                                                                            <a href="product.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                                                <div class="product-highlight ">
                                                                                    
                                                                                                                </div>
                                                                                                                <img width="300" height="354" src="asset/image/product/1.jpg" class="front-image wp-post-image" alt="">
                                                                                                                <img width="300" height="354" src="asset/image/product/11.jpg" class="back-image" alt="">
                                                                                                            </a>
                                                                                    
                                                                                                            <div class="product-buttons">
                                                                                    
                                                                                                                
                                                                                    
                                                                                                                <div class="clear">
                                                                                                                </div>
                                                                                                                
                                                                                                                
                                                                                                            </div>
                                                                                    
                                                                                                        </div>
                                                                                    
                                                                                                        <div class="product-content">
                                                                                    
                                                                                                            <div class="product-title-rating">
                                                                                                                <a class="product-title" href="product.html">
                                                                                                                    <h3>
                                                                                                                        موبایل ۱
                                                                                                                    </h3>
                                                                                                                </a>
                                                                                    
                                                                                                            </div>
                                                                                                            <div class="short-description">
                                                                                                               
                                                                                                                <p> موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱ موبایل ۱</p>
                                                                                                            </div>
                                                                                                            <div class="product-loop-price">
                                                                                                                <span class="price"><span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                                                                                </span>
                                                                                    
                                                                                                            </div>
                                                                                                            <div class="product-buttons">
                                                                                                                <div class="product-cart">
                                                                                                                    <a href="product.html" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="979" data-product_sku="" aria-label="افزودن به سبد خرید&zwnj;ها برای “اجاق گاز روی میزی 2”" rel="nofollow">انتخاب
                                                                                                                        گزینه&zwnj;ها</a>
                                                                                                                </div>
                                                                                    
                                                                                                                
                                                                                    
                                                                                                                <div class="clear">
                                                                                                                </div>
                                                                                                                
                                                                                                                
                                                                                                            </div>
                                                                                    
                                                                                                            
                                                                                    
                                                                                                        </div>
                                                                                                    </div>
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                                        </li>
                                                                                    </ul>
                                                    </li>

                                                








                                                            


                                           

                                            </ul>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
               
                


            </div>
        </div>
    </div>







   
</div> 




{{-- 


<div id="main-content" class="site-content" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <!--<div class="row">-->
                <div class="content-area col-xs-12 col-sm-12 col-md-12" style="transform: none;">


                    <div class="woocommerce-notices-wrapper"></div>
                    <div id="product-187" class="product" style="transform: none;">
                        <div class="single-product-entry" style="transform: none;">
                            <div class="row" style="transform: none;">
                                <div id="product-images-wrapper" class="col-xs-12 col-md-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                    
                                    
                                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; top: 60px; left: 921.5px;"><div class="product-highlight full-layout">





                                    </div><div class="woocommerce-product-gallery woocommerce-product-gallery--with-images images full-layout">
                                        <figure class="woocommerce-product-gallery__wrapper">
                                            <div id="product-image" class="emallshop-slick-carousel slick-initialized slick-slider" data-slick="{&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;asNavFor&quot;: &quot;.product-thumbnails&quot;, &quot;fade&quot;:true, &quot;rtl&quot;:true}"><button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
                                                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 690px;" role="listbox"><div data-thumb="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-2-100x100.jpg" data-thumb-alt="" class="woocommerce-product-gallery__image slick-slide" data-slick-index="0" aria-hidden="true" style="width: 345px; position: relative; right: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;" tabindex="-1" role="option" aria-describedby="slick-slide00"><a href="#" tabindex="-1"><img width="600" height="600" src="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-2.jpg" class="wp-post-image lazy-loaded" alt="" title="PRA326B70E-2" data-caption="" data-src="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-2.jpg" data-large_image="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-2.jpg" data-large_image_width="1500" data-large_image_height="1500"></a></div><div data-thumb="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1-100x100.jpg" data-thumb-alt="" class="woocommerce-product-gallery__image slick-slide slick-current slick-active flex-active-slide" data-slick-index="1" aria-hidden="false" style="width: 345px; position: relative; right: -345px; top: 0px; z-index: 999; opacity: 1;" tabindex="-1" role="option" aria-describedby="slick-slide01"><a href="#" tabindex="0"><img width="600" height="600" src="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1.jpg" class="wp-post-image lazy-loaded" alt="" title="PRA326B70E-1" data-caption="" data-src="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1.jpg" data-large_image="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1.jpg" data-large_image_width="1500" data-large_image_height="1500"></a></div></div></div>
                                                
                                            <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button></div>
                                            <div class="product-thumbnails emallshop-slick-carousel slick-initialized slick-slider" data-slick="{&quot;slidesToShow&quot;: 4,&quot;slidesToScroll&quot;: 1,&quot;asNavFor&quot;: &quot;#product-image&quot;,&quot;arrows&quot;: true, &quot;focusOnSelect&quot;: true,  &quot;rtl&quot;: true, &quot;responsive&quot;:[{&quot;breakpoint&quot;: 639,&quot;settings&quot;:{&quot;slidesToShow&quot;: 4, &quot;vertical&quot;:false ,&quot;rtl&quot;: true}}]}">

                                                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 180px; transform: translate3d(0px, 0px, 0px);" role="listbox"><div class="slick-slide slick-active" data-slick-index="0" aria-hidden="false" style="width: 80px;" tabindex="-1" role="option" aria-describedby="slick-slide10"><img width="100" height="100" src="wp-content/uploads/2015/09/PRA326B70E-2-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" title="PRA326B70E-2"></div><div data-thumb="wp-content/uploads/2015/09/PRA326B70E-1-100x100.jpg" class="slick-slide slick-current slick-active flex-active-slide" data-slick-index="1" aria-hidden="false" style="width: 80px;" tabindex="-1" role="option" aria-describedby="slick-slide11">
                                                    <img width="100" height="100" src="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail lazy-loaded" alt="" title="PRA326B70E-1" data-caption="" data-src="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1-100x100.jpg" data-large_image="http://i-wordpress.ir/demo/emallshop/wp-content/uploads/2015/09/PRA326B70E-1-100x100.jpg" data-large_image_width="100" data-large_image_height="100"></div></div></div>
                                                
                                            </div>
                                        </figure>
                                        <div class="pl-loading"></div>
                                    </div></div></div>
                                <div id="product-summary-wrapper" class="col-xs-12 col-md-8" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                    <!-- .summary -->
                                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;"><div class="summary entry-summary">

                                        <div class="single-product-title">
                                            <h1 class="product_title entry-title">اجاق گاز روی میزی</h1>
                                            <div class="product-next-previous">
                                                <div class="product-prev">
                                                    <a href="#">
                                                        <span class="product-navbar">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </span>
                                                        <div class="product-prev-popup">
                                                            <div class="product-thumb">
                                                                <img width="100" height="100" src="wp-content/uploads/2017/11/y43253-1-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""> </div>
                                                            <div class="product-title-price">
                                                                <span class="ptitle">یخچال ساید بای ساید</span>
                                                                <span class="woocommerce-Price-amount amount">29,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-next">
                                                    <a href="#">
                                                        <span class="product-navbar">
                                                            <i class="fa fa-chevron-left"></i>
                                                        </span>
                                                        <div class="product-next-popup">
                                                            <div class="product-thumb">
                                                                <img width="100" height="100" src="wp-content/uploads/2017/11/5345564646-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""> </div>
                                                            <div class="product-title-price">
                                                                <span class="ptitle">اجاق گاز روی میزی 2</span>
                                                                <span class="woocommerce-Price-amount amount">3,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="woocommerce-product-rating">
                                            <div class="star-rating" role="img" aria-label="امتیاز 3.50 از 5">
                                                <span style="width:70%">امتیازدهی <strong class="rating">3.50</strong> از 5 در <span class="rating">2</span> امتیازدهی مشتری</span></div> <a href="#" class="woocommerce-review-link" rel="nofollow">(<span class="count">2</span> نقد و بررسی)</a>
                                        </div>


                                        <div class="product-price">
                                            <p class="price"><span class="woocommerce-Price-amount amount">250&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                            </p>

                                            <span class="availability instock">موجود</span>


                                        </div>


                                        <div class="woocommerce-product-details__short-description">
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد
                                                نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                                کتابهای زیادی در شصت و سه درصد گذشته،</p>
                                        </div>


                                        <form class="cart" action="http://i-wordpress.ir/demo/emallshop/product/beige-net-anarkali-gown-semi-stitched-suit/" method="post" enctype="multipart/form-data">

                                            <div class="quantity">
                                                <label class="screen-reader-text" for="quantity_5d2584eb59a62">اجاق گاز روی میزی عدد</label>
                                                <input type="number" id="quantity_5d2584eb59a62" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="تعداد" size="4" inputmode="numeric">
                                            </div>

                                            <button type="submit" name="add-to-cart" value="187" class="single_add_to_cart_button button alt">افزودن به سبد
                                                خرید</button>

                                        </form>



                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-187">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="#" rel="nofollow" data-product-id="187" data-product-type="simple" class="add_to_wishlist">
                                                    افزودن به علاقه مندی ها</a>
                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">اضافه شد!</span>
                                                <a href="#" rel="nofollow">
                                                    مشاهده لیست علاقه مندی ها </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">محصول از قبل به علاقه مندی ها اضافه
                                                    شده!</span>
                                                <a href="#" rel="nofollow">
                                                    مشاهده لیست علاقه مندی ها </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div><a href="#" class="compare button" data-product_id="187" rel="nofollow">مقایسه</a>
                                        <div class="product_meta">

                                            <span class="brand_in">برند: <a href="#" rel="tag">Asics</a> , <a href="#" rel="tag">Lacoste</a> , <a href="#" rel="tag">Vans</a> </span>



                                            <span class="posted_in">دسته بند&zwnj;ی: <a href="#" rel="tag">لوازم خانگی</a></span>


                                            <span class="tagged_as">برچسب: <a href="#" rel="tag">اجاق گاز</a>, <a href="#" rel="tag">لوازم خانگی</a></span>


                                        </div>

                                        <div class="social-share style-1">
                                            <ul class="social-link">
                                                <li class="icon-facebook"><a title="اشتراک در فیسبوک" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-facebook"></i>
                                                    </a></li>

                                                <li class="icon-twitter"><a title="اشتراک در twitter" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-twitter"></i>
                                                    </a></li>
                                                <li class="icon-linkedin"><a title="اشتراک در LinkedIn" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a></li>
                                                <li class="icon-google-plus"><a title="اشتراک در google plus" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a></li>

                                                <li class="icon-submit"><a title="اشتراک گذاری در Stumbleupon" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-stumbleupon"></i>
                                                    </a></li>
                                                <li class="icon-pinterest"><a title="اشتراک در Pinterest" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-pinterest"></i>
                                                    </a></li>
                                                <li class="icon-tumblr"><a title="اشتراک گذاری در Tumblr" href="#" onclick="window.open(this.href,this.title,'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=500,height=500,top=300px,left=300px');  return false;">
                                                        <i class="fa fa-tumblr"></i>
                                                    </a>

                                            </li></ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div></div></div>
                            </div>
                        </div><!-- .summary -->


                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="tabs wc-tabs" role="tablist">
                                <li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                                    <a href="#">توضیحات</a>
                                </li>
                                <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                    <a href="#">نظرات (2)</a>
                                </li>
                            </ul>
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                                <h2>توضیحات</h2>

                                <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-8">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p style="text-align: justify;">لورم ایپسوم متن ساختگی
                                                            با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                                            مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                                            فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف
                                                            بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت
                                                            و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و
                                                            متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را
                                                            برای طراحان رایانه ای علی الخصوص طراحان خلاقی و
                                                            فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می
                                                            توان امید داشت که تمام و دشواری موجود در ارائه
                                                            راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد
                                                            نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات
                                                            پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                                            گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                            از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                            سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                            مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد
                                                            گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                                            می طلبد تا با نرم افزارها شناخت بیشتری را برای
                                                            طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ
                                                            پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان
                                                            امید داشت که تمام و دشواری موجود در ارائه راهکارها و
                                                            شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل
                                                            حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل
                                                            دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                                            شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل
                                                            حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل
                                                            دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.شرایط
                                                            سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                                                            دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                                            موجود طراحی اساسا مورد استفاده قرار گیرد.شرایط سخت
                                                            تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                                                            دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                                            موجود طراحی اساسا مورد استفاده قرار گیرد.فعلی
                                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                            ابزارهای کاربردی می باشد. کتابهای زیادی در</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-4">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_single_image wpb_content_element vc_align_center">

                                                    <figure class="wpb_wrapper vc_figure">
                                                        <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                            <img width="600" height="600" src="wp-content/uploads/2015/09/placeholder-1-1.jpg" class="vc_single_image-img attachment-full" alt=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_single_image wpb_content_element vc_align_center">

                                                    <figure class="wpb_wrapper vc_figure">
                                                        <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                            <img width="600" height="600" src="wp-content/uploads/2015/09/placeholder-1-1.jpg" class="vc_single_image-img attachment-full" alt=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-9">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p style="text-align: justify;">لورم ایپسوم متن ساختگی
                                                            با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                                            مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                                            فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف
                                                            بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت
                                                            و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و
                                                            متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را
                                                            برای طراحان رایانه ای علی الخصوص طراحان خلاقی و
                                                            فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می
                                                            توان امید داشت که تمام و دشواری موجود در ارائه
                                                            راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد
                                                            نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات
                                                            پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                                            گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                            از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                            سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                            مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد
                                                            گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                                            می طلبد تا با نرم افزارها شناخت بیشتری را برای
                                                            طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ
                                                            پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان
                                                            امید داشت که تمام و دشواری موجود در ارائه راهکارها و
                                                            شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل
                                                            حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل
                                                            دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="vc_empty_space" style="height: 50px"><span class="vc_empty_space_inner"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                    <div class="wpb_wrapper">
                                                        <style>
                                                            .h_iframe-aparat_embed_frame {
                                                                position: relative;
                                                            }

                                                            .h_iframe-aparat_embed_frame .ratio {
                                                                display: block;
                                                                width: 100%;
                                                                height: auto;
                                                            }

                                                            .h_iframe-aparat_embed_frame iframe {
                                                                position: absolute;
                                                                top: 0;
                                                                left: 0;
                                                                width: 100%;
                                                                height: 100%;
                                                            }
                                                        </style>
                                                        <div class="h_iframe-aparat_embed_frame"> <span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/T9whj/vt/frame" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="vc_tta-container" data-vc-action="collapse">
                                                    <div class="vc_general vc_tta vc_tta-accordion vc_tta-color-grey vc_tta-style-classic vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-right">
                                                        <div class="vc_tta-panels-container">
                                                            <div class="vc_tta-panels">
                                                                <div class="vc_tta-panel vc_active" id="1510138933013-fd308a48-ed62" data-vc-content=".vc_tta-panel-body">
                                                                    <div class="vc_tta-panel-heading">
                                                                        <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                                                            <a href="#" data-vc-accordion="" data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">لورم
                                                                                    ایپسوم متن ساختگی با تولید
                                                                                    سادگی نامفهوم </span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a>
                                                                        </h4>
                                                                    </div>
                                                                    <div class="vc_tta-panel-body">
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>لورم ایپسوم متن ساختگی با
                                                                                    تولید سادگی نامفهوم از صنعت
                                                                                    چاپ و با استفاده از طراحان
                                                                                    گرافیک است. چاپگرها و متون
                                                                                    بلکه روزنامه و مجله در ستون
                                                                                    و سطرآنچنان که لازم است و
                                                                                    برای شرایط فعلی تکنولوژی
                                                                                    مورد نیاز</p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_tta-panel" id="1510138933047-79293327-b945" data-vc-content=".vc_tta-panel-body">
                                                                    <div class="vc_tta-panel-heading">
                                                                        <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                                                            <a href="#" data-vc-accordion="" data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">لورم
                                                                                    ایپسوم متن ساختگی با تولید
                                                                                    سادگی نامفهوم </span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a>
                                                                        </h4>
                                                                    </div>
                                                                    <div class="vc_tta-panel-body">
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>لورم ایپسوم متن ساختگی با
                                                                                    تولید سادگی نامفهوم از صنعت
                                                                                    چاپ و با استفاده از طراحان
                                                                                    گرافیک است. چاپگرها و متون
                                                                                    بلکه روزنامه و مجله در ستون
                                                                                    و سطرآنچنان که لازم است و
                                                                                    برای شرایط فعلی تکنولوژی
                                                                                    مورد نیاز</p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_tta-panel" id="1510139061216-e213536a-1865" data-vc-content=".vc_tta-panel-body">
                                                                    <div class="vc_tta-panel-heading">
                                                                        <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                                                            <a href="#" data-vc-accordion="" data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">لورم
                                                                                    ایپسوم متن ساختگی با تولید
                                                                                    سادگی نامفهوم </span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a>
                                                                        </h4>
                                                                    </div>
                                                                    <div class="vc_tta-panel-body">
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>لورم ایپسوم متن ساختگی با
                                                                                    تولید سادگی نامفهوم از صنعت
                                                                                    چاپ و با استفاده از طراحان
                                                                                    گرافیک است. چاپگرها و متون
                                                                                    بلکه روزنامه و مجله در ستون
                                                                                    و سطرآنچنان که لازم است و
                                                                                    برای شرایط فعلی تکنولوژی
                                                                                    مورد نیاز</p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                                <div id="reviews" class="woocommerce-Reviews">
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">
                                            2 دیدگاه برای <span>اجاق گاز روی میزی</span> </h2>

                                        <ol class="commentlist">
                                            <li class="review even thread-even depth-1" id="li-comment-38">

                                                <div id="comment-38" class="comment_container">

                                                    <img alt="" src="http://0.gravatar.com/avatar/0e45b77b4948e7171a6254d8d3291cc4?s=60&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/0e45b77b4948e7171a6254d8d3291cc4?s=120&amp;d=mm&amp;r=g 2x" class="avatar avatar-60 photo" height="60" width="60">
                                                    <div class="comment-text">

                                                        <div class="star-rating" role="img" aria-label="امتیاز 4 از 5"><span style="width:80%">امتیاز <strong class="rating">4</strong> از 5</span></div>
                                                        <p class="meta">
                                                            <strong class="woocommerce-review__author">admin
                                                            </strong>
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date" datetime="1395-7-23 09:31:15 +00:00">1395-07-23</time>
                                                        </p>

                                                        <div class="description">
                                                            <p>Sit amet velit metus. Proin posuere, ligula nec
                                                                porttitor eget luctus, risus lectus tristique
                                                                ligula, quis vivam pretium elit diam a nisi.
                                                                Proin vehicula malesuada dolor, vel rutrum. quam
                                                                sollicitudin.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li><!-- #comment-## -->
                                            <li class="review odd alt thread-odd thread-alt depth-1" id="li-comment-39">

                                                <div id="comment-39" class="comment_container">

                                                    <img alt="" src="http://0.gravatar.com/avatar/0e45b77b4948e7171a6254d8d3291cc4?s=60&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/0e45b77b4948e7171a6254d8d3291cc4?s=120&amp;d=mm&amp;r=g 2x" class="avatar avatar-60 photo" height="60" width="60">
                                                    <div class="comment-text">

                                                        <div class="star-rating" role="img" aria-label="امتیاز 3 از 5"><span style="width:60%">امتیاز <strong class="rating">3</strong> از 5</span></div>
                                                        <p class="meta">
                                                            <strong class="woocommerce-review__author">admin
                                                            </strong>
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date" datetime="1395-7-23 09:33:14 +00:00">1395-07-23</time>
                                                        </p>

                                                        <div class="description">
                                                            <p>Lectus tristique ligula, quis pretium elit diam a
                                                                nisi.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li><!-- #comment-## -->
                                        </ol>

                                    </div>

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <span id="reply-title" class="comment-reply-title">دیدگاه خود را
                                                    بنویسید <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">لغو
                                                            پاسخ</a></small></span>
                                                <form action="http://i-wordpress.ir/demo/emallshop/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-notes"><span id="email-notes">نشانی ایمیل
                                                            شما منتشر نخواهد شد.</span> بخش&zwnj;های موردنیاز
                                                        علامت&zwnj;گذاری شده&zwnj;اند <span class="required">*</span></p>
                                                    <div class="comment-form-rating"><label for="rating">امتیاز
                                                            شما</label><select name="rating" id="rating" required="">
                                                            <option value="">رای دهید</option>
                                                            <option value="5">عالی</option>
                                                            <option value="4">خوب</option>
                                                            <option value="3">متوسط</option>
                                                            <option value="2">نه خیلی بد</option>
                                                            <option value="1">خیلی بد</option>
                                                        </select></div>
                                                    <p class="comment-form-comment"><label for="comment">دیدگاه
                                                            شما&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea></p>
                                                    <p class="comment-form-author"><label for="author">نام&nbsp;<span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" required=""></p>
                                                    <p class="comment-form-email"><label for="email">ایمیل&nbsp;<span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" required=""></p>
                                                    <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">ذخیره نام، ایمیل و
                                                            وبسایت من در مرورگر برای زمانی که دوباره دیدگاهی
                                                            می&zwnj;نویسم.</label></p>
                                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="ثبت"> <input type="hidden" name="comment_post_ID" value="187" id="comment_post_ID">
                                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                                    </p>
                                                </form>
                                            </div><!-- #respond -->
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>


                        <div class="related products">

                            <h2><span>محصولات مشابه</span></h2>


                            <div class="product-items">
                                <div id="section-5d2584eb7e7d9">
                                    <ul class="products product-carousel owl-carousel product-style1 no-owl owl-theme">



                                        <li class="product type-product post-950 status-publish first instock product_cat-92 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-simple" data-postid="post-950">
                                            <div class="product-entry">

                                                <div class="product-image product-image-style2">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <div class="product-highlight full-layout">





                                                        </div>
                                                        <img width="300" height="354" src="wp-content/uploads/2017/11/356346478586-1-300x354.jpg" class="front-image wp-post-image" alt=""><img width="300" height="354" src="wp-content/uploads/2017/11/424356364-300x354.jpg" class="back-image" alt="">
                                                    </a>

                                                    <div class="product-buttons">

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-950">
                                                            <div class="yith-wcwl-add-button hide" style="display:none">


                                                                <a href="#" rel="nofollow" data-product-id="950" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse show" style="display:block">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="950" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="950">مشاهده سریع</a>
                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="product-content">

                                                    <div class="product-title-rating"> <a class="product-title" href="#">
                                                            <h3>گوشی سامسونگ S8</h3>
                                                        </a>

                                                    </div>
                                                    <div class="short-description">
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                                            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                            زیادی در شصت و سه درصد گذشته،</p>
                                                    </div>
                                                    <div class="product-loop-price">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">19,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></span>

                                                    </div>
                                                    <div class="product-buttons">
                                                        <div class="product-cart">
                                                            <a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="950" data-product_sku="" aria-label="افزودن “گوشی سامسونگ S8” به سبد" rel="nofollow">افزودن به سبد خرید</a> </div>

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-950">
                                                            <div class="yith-wcwl-add-button hide" style="display:none">


                                                                <a href="#" rel="nofollow" data-product-id="950" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse show" style="display:block">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="950" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="950">مشاهده سریع</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>




                                        <li class="product type-product post-965 status-publish instock product_cat-96 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-simple" data-postid="post-965">
                                            <div class="product-entry">

                                                <div class="product-image product-image-style2">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <div class="product-highlight full-layout">





                                                        </div>
                                                        <img width="300" height="354" src="wp-content/uploads/2017/11/3534543535435-300x354.jpg" class="front-image wp-post-image" alt=""><img width="300" height="354" src="wp-content/uploads/2017/11/4234242424-300x354.jpg" class="back-image" alt="">
                                                    </a>

                                                    <div class="product-buttons">

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-965">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="965" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="965" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="965">مشاهده سریع</a>
                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="product-content">

                                                    <div class="product-title-rating"> <a class="product-title" href="#">
                                                            <h3>کنسول بازی Xbox one</h3>
                                                        </a>

                                                    </div>
                                                    <div class="short-description">
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                                            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                            زیادی در شصت و سه درصد گذشته،</p>
                                                    </div>
                                                    <div class="product-loop-price">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">250&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></span>

                                                    </div>
                                                    <div class="product-buttons">
                                                        <div class="product-cart">
                                                            <a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="965" data-product_sku="" aria-label="افزودن “کنسول بازی Xbox one” به سبد" rel="nofollow">افزودن به سبد خرید</a> </div>

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-965">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="965" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="965" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="965">مشاهده سریع</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>




                                        <li class="product type-product post-973 status-publish instock product_cat-96 product_tag-91 product_tag-90 has-post-thumbnail sale shipping-taxable purchasable product-type-simple" data-postid="post-973">
                                            <div class="product-entry">

                                                <div class="product-image product-image-style2">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <div class="product-highlight full-layout">




                                                            <div class="onsale"><span>35% تخفیف!</span></div>
                                                        </div>
                                                        <img width="300" height="354" src="wp-content/uploads/2017/11/r53453453-1-300x354.jpg" class="front-image wp-post-image" alt=""><img width="300" height="354" src="wp-content/uploads/2017/11/r5435346-1-300x354.jpg" class="back-image" alt="">
                                                    </a>

                                                    <div class="product-buttons">

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-973">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="973" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="973" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="973">مشاهده سریع</a>
                                                        </div>
                                                    </div>

                                                    <div class="product-countdown">
                                                        <div class="countdown is-countdown" data-year="2019" data-month="6" data-day="22" data-hours="19" data-minutes="30" data-seconds="00"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">1</span><span class="countdown-period">روز</span></span><span class="countdown-section"><span class="countdown-amount">8</span><span class="countdown-period">ساعت</span></span><span class="countdown-section"><span class="countdown-amount">46</span><span class="countdown-period">دقیقه</span></span><span class="countdown-section"><span class="countdown-amount">41</span><span class="countdown-period">ثانیه</span></span></span></div>
                                                    </div>



                                                </div>

                                                <div class="product-content">

                                                    <div class="product-title-rating"> <a class="product-title" href="#">
                                                            <h3>دوربین دیجیتال نیکون</h3>
                                                        </a>

                                                    </div>
                                                    <div class="short-description">
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                                            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                            زیادی در شصت و سه درصد گذشته،</p>
                                                    </div>
                                                    <div class="product-loop-price">
                                                        <span class="price"><del><span class="woocommerce-Price-amount amount">29,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></del>
                                                            <ins><span class="woocommerce-Price-amount amount">19,000&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></ins></span>

                                                    </div>
                                                    <div class="product-buttons">
                                                        <div class="product-cart">
                                                            <a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="973" data-product_sku="" aria-label="افزودن “دوربین دیجیتال نیکون” به سبد" rel="nofollow">افزودن به سبد خرید</a> </div>

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-973">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="973" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="973" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="973">مشاهده سریع</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>




                                        <li class="product type-product post-960 status-publish last instock product_cat-92 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-simple" data-postid="post-960">
                                            <div class="product-entry">

                                                <div class="product-image product-image-style2">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <div class="product-highlight full-layout">





                                                        </div>
                                                        <img width="300" height="354" src="wp-content/uploads/2017/11/12312535-300x354.jpg" class="front-image wp-post-image" alt=""><img width="300" height="354" src="wp-content/uploads/2017/11/456457588-1-300x354.jpg" class="back-image" alt="">
                                                    </a>

                                                    <div class="product-buttons">

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-960">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="960" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="960" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="960">مشاهده سریع</a>
                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="product-content">

                                                    <div class="product-title-rating"> <a class="product-title" href="#">
                                                            <h3>موبایل هوشمند سامسونگ</h3>
                                                        </a>

                                                    </div>
                                                    <div class="short-description">
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                                            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                            زیادی در شصت و سه درصد گذشته،</p>
                                                    </div>
                                                    <div class="product-loop-price">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">250&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></span>

                                                    </div>
                                                    <div class="product-buttons">
                                                        <div class="product-cart">
                                                            <a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="960" data-product_sku="" aria-label="افزودن “موبایل هوشمند سامسونگ” به سبد" rel="nofollow">افزودن به سبد خرید</a> </div>

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-960">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="960" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="960" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="960">مشاهده سریع</a>
                                                        </div>
                                                    </div>


                                                    <div class="product-extra-info">
                                                        <div class="product-attrs">

                                                            <div class="product-attribute">
                                                                رنگ : <span class="attr-value">
                                                                    آبی </span> - <span class="attr-value">
                                                                    سبز </span> - <span class="attr-value">
                                                                    سیاه </span> - <span class="attr-value">
                                                                    قرمز </span> </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>




                                        <li class="product type-product post-977 status-publish first instock product_cat-96 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-simple" data-postid="post-977">
                                            <div class="product-entry">

                                                <div class="product-image product-image-style2">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <div class="product-highlight full-layout">





                                                        </div>
                                                        <img width="300" height="354" src="wp-content/uploads/2017/11/81DT3VDUvGL._SL1500_-1-600x650-300x354.jpg" class="front-image wp-post-image" alt=""><img width="300" height="354" src="wp-content/uploads/2017/11/r5435346-1-300x354.jpg" class="back-image" alt="">
                                                    </a>

                                                    <div class="product-buttons">

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-977">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="977" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="977" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="977">مشاهده سریع</a>
                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="product-content">

                                                    <div class="product-title-rating"> <a class="product-title" href="#">
                                                            <h3>دوربین دیجیتال کنون</h3>
                                                        </a>

                                                    </div>
                                                    <div class="short-description">
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                                            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                            زیادی در شصت و سه درصد گذشته،</p>
                                                    </div>
                                                    <div class="product-loop-price">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">250&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></span>

                                                    </div>
                                                    <div class="product-buttons">
                                                        <div class="product-cart">
                                                            <a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="977" data-product_sku="" aria-label="افزودن “دوربین دیجیتال کنون” به سبد" rel="nofollow">افزودن به سبد خرید</a> </div>

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-977">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="977" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="977" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="977">مشاهده سریع</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>




                                        <li class="product type-product post-959 status-publish instock product_cat-92 product_tag-91 product_tag-90 has-post-thumbnail shipping-taxable purchasable product-type-simple" data-postid="post-959">
                                            <div class="product-entry">

                                                <div class="product-image product-image-style2">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <div class="product-highlight full-layout">





                                                        </div>
                                                        <img width="300" height="354" src="wp-content/uploads/2017/11/424356364-300x354.jpg" class="front-image wp-post-image" alt=""><img width="300" height="354" src="wp-content/uploads/2017/11/12312535-1-1-300x354.jpg" class="back-image" alt="">
                                                    </a>

                                                    <div class="product-buttons">

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-959">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="959" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="959" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="959">مشاهده سریع</a>
                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="product-content">

                                                    <div class="product-title-rating"> <a class="product-title" href="#">
                                                            <h3>گوشی هواوی P8</h3>
                                                        </a>

                                                    </div>
                                                    <div class="short-description">
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                                            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                            زیادی در شصت و سه درصد گذشته،</p>
                                                    </div>
                                                    <div class="product-loop-price">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">250&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></span>

                                                    </div>
                                                    <div class="product-buttons">
                                                        <div class="product-cart">
                                                            <a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="959" data-product_sku="" aria-label="افزودن “گوشی هواوی P8” به سبد" rel="nofollow">افزودن به سبد خرید</a> </div>

                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-959">
                                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                                <a href="#" rel="nofollow" data-product-id="959" data-product-type="simple" class="add_to_wishlist">
                                                                    افزودن به علاقه مندی ها</a>
                                                                <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                                                            </div>

                                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                <span class="feedback">اضافه شد!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                <span class="feedback">محصول از قبل به علاقه
                                                                    مندی ها اضافه شده!</span>
                                                                <a href="#" rel="nofollow">
                                                                    مشاهده لیست علاقه مندی ها </a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="woocommerce product compare-button"><a href="#" class="compare button" data-product_id="959" rel="nofollow">مقایسه</a></div>
                                                        <div class="quickview-button">
                                                            <a class="quickview" href="#" data-product_id="959">مشاهده سریع</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div><!-- #product-187 -->




                </div>


            </div>
        </div><!-- .content-area -->
    </div> --}}


    @endsection