@extends('front.layout')

@section('content')
    <div class="container login">

            <div class="row logo_box">
                <img src="{{asset('assets/front/image/logo.png')}}">
            </div>
    
            <div class="row form_box">

                <form method="POST" action="http://shop.py/login" class="col-lg-4 col-md-5 col-sm-6  col-xs-11 form_login">
                    <input type="hidden" name="_token" value="QLPLRjtkWGq97vAHbyc7Kpjnobm3dfFHRC6kYJq0">
                    <div class="form-group">
    
                        <h1 class="title_">تایید ایمیل کاربری</h1>
                        <label for="exampleInputEmail1">برای دسترسی به پنل کاربری ایمیل خود را تایید کنید </label>


                        


                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ایمیل با موفقیت ارسال شد') }}
                        </div>
                         @endif



                        <a style="float: right; margin-right: 10px;" href="{{ route('verification.resend') }}" class="link link_left">  ایمیل دریافت نکردم  ارسال مجدد ایمیل</a>
                       
                        
                    </div>
                </form>

            </div>
    
    
        </div>

@endsection
