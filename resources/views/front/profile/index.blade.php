@extends('front.profile.layout')

@section('body')
    <section class="col-lg-9 left_box">
        <h2 class="titel_method">پروفایل حساب کاربری</h2>
        <div class="method_body">


            <div class="profile row">
                <form class="profile_form col-lg-4" method="post" id="profile-form">
                    <p>برای تغییر مشخصات فردی اطلاعات قدیمی را پاک کرده و اطلاعات جدید را وارد کرده و دکمه ویرایش
                        اطلاعات را کلیک کنید </p>


                    <div class="form-group">
                        <label for="">نام</label>
                        <input value="{{Auth::user()->first_name}}" type="text" class="form-control" name="" id=""
                               placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">نام خانوادگی</label>
                        <input value="{{Auth::user()->last_name}}" type="text" class="form-control" name="" id=""
                               placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">ایمیل</label>
                        <input value="{{Auth::user()->email}}" disabled type="email" class="form-control" name="" id=""
                               placeholder="">
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
                        <select class="form-control" v-model="country" name="" id="country_select">
                            <option :value="item.id" v-for="item in country_list">@{{ item.name }}</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="">استان</label>
                        <select class="form-control" v-model="state" name="" id="state_select">
                            <option :value="item.id" v-for="item in state_list">@{{ item.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">شهر</label>
                        <select class="form-control" v-model="city" name="" id="city_select">
                            <option :value="item.id" v-for="item in city_list">@{{ item.name }}</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="">آدرس </label>
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>


                    <button type="submit" class="btn btn-success">ویرایش اطلاعات</button>


                </form>

                <form class="change_pass col-lg-4">

                    <p>برای تغییر رمز عبور در قسمت مشخص شده رمز عبور جدید و رمز عبور قدیمی خود را وارد کرده و دکمه تغییر
                        پسورد کلیک کنید </p>


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
        new Vue({
            el: '#profile-form',
            data: {
                country: null,
                state: null,
                city: null,
            },
            computed: {
                country_list: function () {
                    return this.getList('country');
                },
                state_list: function () {
                    return this.getList('state', 'country');
                },
                city_list: function () {
                    return this.getList('city', 'state');
                }
            },
            methods: {
                getList: function (name, get) {
                    get = (get === undefined) ? '' : this[get];
                    var list = {};

                    $.ajax({
                        type: "get",
                        url: app_url + "/api/address/" + name + "/" + get,
                        async: false
                    }).done(function (r) {
                        list = r;
                    });

                    return list;
                }
            }
        });
    </script>
@endsection