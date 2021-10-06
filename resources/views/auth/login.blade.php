@extends('front.layout')

@section('content')

    <div class="container login">

        <div class="row logo_box">
            <img src="{{asset('assets/front/image/logo.png')}}">
        </div>

        <div class="row form_box">
            <form method="POST" action="{{ route('login') }}" class="col-lg-4 col-md-5 col-sm-6  col-xs-11 form_login">

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

                    <h1 class="title_">ورود به {{setting('site.title')}}

                    </h1>
                    <label for="exampleInputEmail1">ایمیل </label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="ایمیل خود را وارد کنید" required value="{{old('email')}}">

                    <label for="exampleInputEmail1">رمز عبور
                        @if(Route::has('password.request'))
                            <a href="{{route('password.request')}}" class="link link_left">رمز عبور خود را فراموش
                                کرده‌ام</a>
                        @endif
                    </label>
                    <input type="password" id="password" name="password" class="form-control "
                           placeholder="رمز عبور خود را وارد کنید" required>

                    <input class="btn btn-success btn_submit" type="submit"
                           value="ورود ">


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label label_ii" style="width: auto" for="remember">
                            مرا به خاطر داشته باش
                        </label>
                    </div>


                    <span>
                                کاربر جدید هستید؟
                                <a href="{{route('register')}}" class="link"> ثبت‌نام در {{setting('site.title')}}</a>

                        </span>


                </div>


            </form>


        </div>


    </div>

@endsection