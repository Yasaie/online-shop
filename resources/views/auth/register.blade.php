@extends('front.layout')

@section('content')

    <div class="container login">

        <div class="row logo_box">
            <img src="{{asset('assets/front/image/logo.png')}}">
        </div>

        <div class="row form_box">
            <form method="POST" action="{{ route('register') }}" class="col-lg-4 col-md-5 col-sm-6  col-xs-11 form_login">

                @csrf

                @if($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">

                    <h1 class="title_">ثبت‌نام در {{setting('site.title')}}</h1>

                    <label for="first_name">نام </label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           placeholder="نام خود را وارد کنید" required value="{{ old('first_name') }}">

                    <label for="last_name">نام خانوادگی </label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           placeholder="نام خانوادگی خود را وارد کنید" required value="{{ old('last_name') }}">

                    <label for="email">ایمیل </label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="ایمیل خود را وارد کنید" required value="{{ old('email') }}">

                    <label for="password">رمز عبور</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="رمز عبور خود را وارد کنید" required>


                    <input class="btn btn-success btn_submit" type="submit"
                           value="ثبت‌نام">


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label label_ii" style="display: inline" for="gridCheck1">
                            <a href="http://turkanipekyolu.com/page/188/%D8%B4%D8%B1%D8%A7%DB%8C%D8%B7"
                               class="link_inline">حریم خصوصی</a> و <a
                                    href="http://turkanipekyolu.com/page/188/%D8%B4%D8%B1%D8%A7%DB%8C%D8%B7"
                                    class="link_inline"> شرایط و قوانین</a> استفاده از سرویس های سایت تورکان ایپک یولی
                            را مطالعه نموده و با کلیه موارد آن موافقم.

                        </label>

                    </div>

                    <br>
                    <span>
                                قبلا در {{setting('site.title')}} ثبت‌نام کرده‌اید؟
                                <a href="{{route('login')}}" class="link">وارد شوید</a>

                        </span>


                </div>


            </form>


        </div>


    </div>














@endsection