@extends('front.layout')

@section('content')
    




<div class="container login">
    
    <div class="row logo_box">
        <img src="asset/image/logo.png">
    </div>

    <div class="row form_box">
        <form action="" method="GET" class="col-lg-4 col-md-5 col-sm-6  col-xs-11 form_login">

                <div class="form-group">

                        <h1 class="title_">تغییر کلمه عبور</h1>
                        <label for="exampleInputEmail1">کلمه عبور </label>
                        <input type="password" id="inputPassword4" class="form-control p-20"  aria-describedby="emailHelp" placeholder="کلمه عبور جدید را وارد کنید">
                       
                        <label for="exampleInputEmail1">تکرار کلمه عبور </label>
                        <input type="password" id="inputPassword4" class="form-control p-20"  aria-describedby="emailHelp" placeholder="کلمه عبور خود را تکرار کنید">
                       
                        
                    

                        <input name="" id="" class="btn btn-success btn_submit" type="submit" value="تغییر کلمه عبور">

                    
                    
                    
                    
                    
                    
                    
                    </div>


        </form>






        









    </div>


</div>














@endsection