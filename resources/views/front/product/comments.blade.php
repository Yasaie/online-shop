<div class="row body_comments" id="comment_productt">

    <div class="col-lg-12 titel_comments">
        <i class="fa fa-comments-o" aria-hidden="true"></i>
        نظرات کاربران
        (<span>12</span>)
    </div>

    <form class="disable_form" action="" method="GET" style="margin: 40px 0px">

        <div class="form-group  col-lg-5 col-md-7 col-sm-9 col-xs-12">
            <input style="margin: 10px;" disabled type="text" class="form-control link_f" id="link_f"
                   name="title" id="title" aria-describedby="helpId" placeholder="عنوان ">

            <textarea style="margin: 10px; min-height: 200px" name="comment" disabled
                      placeholder="نظرات خود را وارد کنید" style="min-height: 200px"
                      class="form-control link_f" id="exampleFormControlTextarea1" rows="3"></textarea>

            <input disabled style="margin: 10px;" name="sub" class="btn link_f btn-success" type="submit"
                   value="ارسال دیدگاه">
        </div>

    </form>

    @foreach($comments as $comment)
        <div class="main_comments  col-lg-5 col-md-7 col-sm-9 col-xs-12">
            <div class="header_coment">
                <h4 style="display: inline-block">{{$comment->title}}</h4></div>
            <div class="body_coment">
                {{$comment->body}}
            </div>

            <div class="footer_coment">
                <div class="user_info">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    @lang('product.comment_by', ['name' => "{$comment->user->first_name} {$comment->user->last_name}"])
                </div>

                <div class="date_info">
                    @lang('product.comment_at', ['date' => $comment->created_at->format('l j F Y')])
                </div>

            </div>

        </div>
    @endforeach

</div>