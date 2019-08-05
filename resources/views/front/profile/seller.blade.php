@extends('front.profile.layout')

@section('body')


    <section class="col-lg-9 left_box">
        <h2 class="titel_method">فرم درخواست فروشگاه</h2>

        <div class="method_body">

            <div class="row seller">


                <form class="col-lg-5 seller_form">

                    <div class="form-group">
                        <div class="form-check">
                            <h4>چه نوع فروشنده ای هستید ؟</h4>
                            <div class="radio">
                                <label><input onchange="show_form()" value="company" type="radio" name="business"><span><i
                                                class="fa fa-address-card" aria-hidden="true"></i>
                                                                        شخص حقوقی</span></label>
                                <label><input onchange="show_form()" value="personal" type="radio" name="business"
                                              checked><span> <i class="fa fa-user-o" aria-hidden="true"></i>
                                                                        شخص حقیقی</span></label>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <span class="title_form">اطلاعات شخصی</span>
                    <div class="personal_info row">
                        <label for="">نام</label>
                        <input type="text" class="form-control" name="lname" id="" aria-describedby="emailHelpId"
                               placeholder="">

                        <label for="">نام خانوادگی</label>
                        <input type="text" class="form-control" name="fname" id="" aria-describedby="emailHelpId"
                               placeholder="">
                    </div>


                    <div class="birthday">
                        <div class="form-group">

                            <label for="birthday">تاریخ تولد</label>

                            <select class="custom-select" name="birthday_day" id="birthday">
                                <option selected>روز</option>
                                @for ($i = 1; $i < 31; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>


                            <select class="custom-select" name="birthday_month" id="birthday">
                                <option selected>ماه</option>
                                @for ($i = 1; $i < 13; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>


                            <select class="custom-select" name="birthday_year" id="birthday">
                                <option selected>سال</option>
                                @for ($i = 1300; $i < 1398; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <hr>


                    <div class="company_show" style="display: none">
                        <span class="title_form">اطلاعات شرکت</span>
                        <div class="form-group">
                            <label for="">نام شرکت</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="">شماره ثبت</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="">شناسه ملی</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="">کد اقتصادی</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">

                        </div>


                        <div class="form-group">
                            <label for="">صاحبان حق امضا</label>
                            <textarea type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                      placeholder=""></textarea>

                        </div>
                        <hr>
                    </div>


                    <div class="personal_show">
                        <span class="title_form">جنسیت</span>

                        <div class="radio">

                            <label>
                                <input type="radio" name="gender" checked><span>
                                                                            <i class="fa fa-mars"
                                                                               aria-hidden="true"></i>
                                                                            مرد</span>
                            </label>

                            <label>
                                <input type="radio" name="gender"><span>
                                                                            <i class="fa fa-venus"
                                                                               aria-hidden="true"></i>
                                                                            زن</span>
                            </label>
                        </div>


                        <div class="personal_info row">
                            <label for="">شماره شناسنامه</label>
                            <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId"
                                   placeholder="">

                            <label for="">کد ملی</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="emailHelpId"
                                   placeholder="">
                        </div>


                        <hr>
                    </div>


                    <div>
                        <span class="title_form">اطلاعات تماس</span>


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
                            <label for="">آدرس</label>
                            <textarea type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                      placeholder=""></textarea>

                        </div>

                        <div class="form-group">
                            <label for="">کد پستی</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">

                        </div>


                        <div class="form-group">
                            <label for="">تلفن ثابت</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">

                        </div>

                        <div class="form-group">
                            <label for="">تلفن همراه</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">

                        </div>

                        <hr>
                    </div>


                    <div>
                        <span class="title_form">اطلاعات تجاری</span>

                        <div class="form-group">
                            <label for="">نام فروشگاه</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="">شماره شبا</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="">
                        </div>

                        <hr>
                    </div>


                    <div>
                        <span class="title_form">تصویر کارت ملی</span>

                        <div class="form-group">

                            <div id="loadFileXml" class="btn bg-success"
                                 onclick="document.getElementById('file').click();">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                بار گذاری تصویر کارت ملی
                            </div>

                            <input type="file" style="display:none;" id="file" name="file"/>

                        </div>
                        <hr>
                    </div>


                    <button type="submit" class="btn btn-success">بارگزاری اطلاعات</button>


            </div>


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