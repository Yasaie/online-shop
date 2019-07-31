@extends('front.profile.layout')

@section('body')
 <section class="col-lg-9 left_box">
            <h2 class="titel_method">پروفایل حساب کاربری</h2>
            <div class="method_body">


                <div class="profile row">
                    <form class="profile_form col-lg-4">
                            <p>برای تغییر مشخصات فردی اطلاعات قدیمی را پاک کرده و اطلاعات جدید را وارد کرده و دکمه ویرایش اطلاعات را کلیک کنید </p>



                            <div class="form-group">
                                    <label for="">نام</label>
                                    <input value="{{Auth::user()->first_name}}" type="text" class="form-control" name="" id="" placeholder="">
                                                            </div>
                            
                            <div class="form-group">
                                    <label for="">نام خانوادگی</label>
                                    <input value="{{Auth::user()->last_name}}" type="text" class="form-control" name="" id="" placeholder="">
                                </div>
                            
                            <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <input value="{{Auth::user()->email}}" disabled type="email" class="form-control" name="" id="" placeholder="">
                                </div>


                            <button type="submit" class="btn btn-success">ویرایش اطلاعات</button>


                    

                    </form>

                    <form class="change_pass col-lg-4">

                        <p>برای تغییر رمز عبور در قسمت مشخص شده رمز عبور جدید و رمز عبور قدیمی خود را وارد کرده و دکمه تغییر پسورد کلیک کنید </p>


                            <div class="form-group">
                                    <label for="">پسورد قبلی</label>
                                    <input type="password" class="form-control" name="" id="" placeholder="">
                                                            </div>
                            
                            <div class="form-group">
                                    <label for="">پسورد جدید</label>
                                    <input type="password" class="form-control" name="" id="" placeholder="">
                                </div>
                            
                            <div class="form-group">
                                    <label for="">پسورد تکرار جدید</label>
                                    <input type="password" class="form-control" name="" id="" placeholder="">
                                </div>
                                                                                                    
                                <button type="submit" class="btn btn-success">تغییر پسورد</button>
                    

                    </form>
                </div>
               
                   

            </div>
        </section>
@endsection