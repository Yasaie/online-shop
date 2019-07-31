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

                <a  class="method">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    پروفایل
                </a>
                
                <a  class="method">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        همه سفارش ها
                </a>

              

                <a href="{{route('cart.index')}}" class="method">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    سبد خرید
                </a>

               

              



            </div>
        




        </section>
        <section class="col-lg-9 left_box">
            <h2 class="titel_method"> همه سفارش ها</h2>
            <div class="method_body">

                   
                <table class="table table_list_broduct mobile_v">
                        
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>شماره سفارش</th>
                            <th>تاریخ ثبت سفارش</th>
                            <th>زمان تحویل</th>
                            <th>مبلغ  کل</th>
                            <th>عمیات پرداخت</th>
                            <th>جزییات</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td>1</td>
                                <td>5987</td>
                                <td>30 آذر 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        


                        <tr>
                                <td>2</td>
                                <td>07872</td>
                                <td>2 آبان 1378</td>
                                <td  class="text-danger">لغو شد</td>
                                <td>6,873,000 تومان</td>
                                <td  class="text-danger">لغو شده</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        <tr>
                                <td>3</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        
                        <tr>
                                <td>4</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td class="text-danger">در دست اقدام</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>

                        <tr>
                                <td>5</td>
                                <td>5987</td>
                                <td>30 آذر 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        


                        <tr>
                                <td>6</td>
                                <td>07872</td>
                                <td>2 آبان 1378</td>
                                <td  class="text-danger">لغو شد</td>
                                <td>6,873,000 تومان</td>
                                <td  class="text-danger">لغو شده</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        <tr>
                                <td>7</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        
                        <tr>
                                <td>8</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td class="text-danger">در دست اقدام</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>



                        <tr>
                                <td>9</td>
                                <td>5987</td>
                                <td>30 آذر 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        


                        <tr>
                                <td>10</td>
                                <td>07872</td>
                                <td>2 آبان 1378</td>
                                <td  class="text-danger">لغو شد</td>
                                <td>6,873,000 تومان</td>
                                <td  class="text-danger">لغو شده</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        <tr>
                                <td>11</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        
                        <tr>
                                <td>12</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td class="text-danger">در دست اقدام</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        <tr>
                                <td>9</td>
                                <td>5987</td>
                                <td>30 آذر 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        


                        <tr>
                                <td>10</td>
                                <td>07872</td>
                                <td>2 آبان 1378</td>
                                <td  class="text-danger">لغو شد</td>
                                <td>6,873,000 تومان</td>
                                <td  class="text-danger">لغو شده</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        <tr>
                                <td>11</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        
                        <tr>
                                <td>12</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td class="text-danger">در دست اقدام</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        <tr>
                                <td>9</td>
                                <td>5987</td>
                                <td>30 آذر 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>
                        


                        <tr>
                                <td>10</td>
                                <td>07872</td>
                                <td>2 آبان 1378</td>
                                <td  class="text-danger">لغو شد</td>
                                <td>6,873,000 تومان</td>
                                <td  class="text-danger">لغو شده</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        <tr>
                                <td>11</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td  class="text-success">تحویل داده شد</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>


                        
                        <tr>
                                <td>12</td>
                                <td>45674567</td>
                                <td>8 دی 1378</td>
                                <td class="text-danger">در دست اقدام</td>
                                <td>4,000,000 تومان</td>
                                <td class="text-success">موفق</td>
                                <td class="link">بیشتر</td>
                        </tr>







                    </tbody>
                </table>

            </div>
        </section>
    </div>
</div>


@endsection