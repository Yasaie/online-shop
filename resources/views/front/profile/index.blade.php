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

                            <div class="form-group">
                                <label for="">نام خانوادگی</label>
                                <input value="{{Auth::user()->last_name}}" type="text" class="form-control" name="" id="" placeholder="">
                            </div>


                            <div class="form-group">
                                <label for="">شماره موبایل</label>
                                <input type="text" class="form-control" name="" id="" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="">تلفن ثابت</label>
                                <input type="text" class="form-control" name="" id="" placeholder="">
                            </div>



                            <div class="form-group">
                                <label for="">کشور</label>
                                <select class="form-control" onchange="onchange_country()" name="" id="country_select">
    
                                </select>
                            </div>
    
    
                            <div class="form-group">
                                <label for="">استان</label>
                                <select class="form-control" onchange="onchange_state()" name="" id="state_select">
    
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="">شهر</label>
                                <select class="form-control" name="" id="city_select">
    
                                </select>
                            </div>







                            <div class="form-group">
                              <label for="">آدرس </label>
                              <textarea class="form-control" name="" id="" rows="3"></textarea>
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








@section('footer_include')


<script>
    function show_form(){
      var chose=$('input[name=business]:checked').val();

       if(chose=="company"){
           $(".company_show").show(500);
           $(".personal_show").hide(500);
       }else{
        $(".company_show").hide(500);
        $(".personal_show").show(500);

        
       }



    }





</script>





<script>


    $(function () {

        $.ajax({
            type: "get",
            url: app_url + "/api/address/country",


            success: function (response) {


                for (let i = 0; i < response.length; i++) {


                    $("#country_select").append(' <option value="' + response[i].id + '">' + response[i].name + '</option>');

                }

                onchange_country()
            }
        });

    });


    function onchange_country() {

        $("#state_select").children().remove();
        $("#city_select").children().remove();
        $.ajax({
            type: "get",
            url: app_url + "/api/address/state/" + $('#country_select').find(":selected").val(),


            success: function (response) {


                for (let i = 0; i < response.length; i++) {


                    $("#state_select").append(' <option value="' + response[i].id + '">' + response[i].name + '</option>');

                }

                onchange_state()
            }
        });

    }


    function onchange_state() {


        $("#city_select").children().remove();
        $.ajax({
            type: "get",
            url: app_url + "/api/address/city/" + $('#state_select').find(":selected").val(),


            success: function (response) {


                $("#city_select").children().remove();
                for (let i = 0; i < response.length; i++) {

                    $("#city_select").append(' <option value="' + response[i].id + '">' + response[i].name + '</option>');

                }
            }
        });


    }


</script>
@endsection