<div class="row body_comments" id="comment_productt">

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-12 titel_comments">
        <i class="fa fa-comments-o" aria-hidden="true"></i>
        نظرات کاربران
        (<span>{{ $comments->count() }}</span>)
    </div>

    <form action="{{route('product.comment')}}" method="POST" style="margin: 40px 0px" id="recaptcha-form"
          class="col-lg-5 col-md-7 col-sm-9 col-xs-12 {{ ! Auth::check() ? 'disable_form' : '' }}">

        @csrf
        <input type="hidden" name="product" value="{{ $product->id }}">
        <div class="form-group">
            <label for="title" class="screen-reader-text">عنوان</label>
            <input type="text" class="form-control" name="title" id="title"
                   placeholder="عنوان" required>
        </div>
        <div class="form-group">
            <label for="text" class="screen-reader-text">نظرات خود را وارد کنید</label>
            <textarea style="min-height: 200px" name="text" id="text"
                      placeholder="نظرات خود را وارد کنید"
                      class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            {!! htmlFormButton('ارسال دیدگاه') !!}
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