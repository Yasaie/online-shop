<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'fa' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<hr>
@foreach(\App\Language::get() as $lang)
    <a href="/lang/{{$lang->id}}">{{$lang->name}}</a>
@endforeach
 |
@foreach($currencies as $currency)
    <a href="/currency/{{$currency->key}}">{{$currency->locale('name')}}</a>
@endforeach
<hr>

{{$product->id}}
<div>{{$product->locale('title')}}</div>

<div>
    @lang('product.category'):
    @foreach($product_cats->reverse() as $category)
        @if($category)
            <a href="/category/{{$category->id}}">{{$category->locale('title')}}</a> /
        @endif
    @endforeach
    {{$product->locale('title')}}
</div>

<div>@lang('product.rates'): {{$rates}}</div>
{{$sellers->first()->current_price}} {{Config::get('app.current_currency')->title}}

<br><br><hr>@lang('product.sellers')<hr>
@foreach($sellers as $seller)
    <div>
    <bdi>
        {{$seller->user->first_name}} {{$seller->user->last_name}} -
        {{$seller->current_price}} {{Config::get('app.current_currency')->title}}
    </bdi>
    </div>
@endforeach

<br><br><hr>@lang('product.description')<hr>
<div>{{$product->locale('description')}}</div>

<br><br><hr>@lang('product.specification')<hr>
@foreach($product_specs as $spec)
    <div><span>{{$spec->specs->locale('title')}}</span> : <span>{{$spec->locale('title')}}</span></div>
@endforeach

<br><br><hr>@lang('product.related_products')<hr>
@foreach($related_products as $rp)
    <div>
        <a href="/product/{{$rp->id}}/{{$rp->locale('title')}}">{{$rp->locale('title')}}</a> -
        {{$rp->sellers->sortBy('current_price', SORT_NATURAL)->first()->current_price}} {{Config::get('app.current_currency')->title}}
    </div>
@endforeach

<br><br><hr>@lang('product.comments')<hr>
@foreach($comments as $comment)
    <div>
        <div>@lang('product.comment_by', ['name' => "{$comment->user->first_name} {$comment->user->last_name}"])</div>
        <div>@lang('product.comment_at', ['date' => gdate($comment->created_at)->format('l j F Y')])</div>
        <div>متن: {{$comment->body}}</div>
    </div>
    <hr>
@endforeach

</body>
</html>