@extends('front.layout.index')
@section('page-title', $product->locale('title'))

@section('body')

<h3><a href="/product/{{$product->id}}/{{$product->locale('title')}}">{{$product->locale('title')}}</a></h3>

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
<br>
<div>
    <h4>ویژگی‌ها:</h4>
    @foreach($product->details->where('highlighted', 1) as $detail)
        <div>{{$detail->detailKey->locale('title')}} : {{$detail->detailValue->locale('title')}}</div>
    @endforeach
</div>

<br><br><hr><h4>@lang('product.sellers')</h4>
@foreach($sellers as $seller)
    @php
        $seller->rates = $seller->user
            ->products
            ->unique()
            ->avg('product_rate');
    @endphp
    <div>
        <span>تعداد: {{$seller->amount}}</span> -
        <span>امتیاز: {{$seller->rates}}</span> -
        @if($seller->locale('type'))
        <span> نوع: {{$seller->locale('type')}}</span> -
        @endif
        <span>{{$seller->user->first_name}} {{$seller->user->last_name}}</span> -
        <bdi>{{$seller->current_price}} {{Config::get('app.current_currency')->title}}</bdi>
    </div>
@endforeach

<br><br><hr><h4>@lang('product.description')</h4>
<div>{{$product->locale('description')}}</div>

<br><br><hr><h4>@lang('product.specification')</h4>
@foreach($product_details as $detail)
    <table width="50%">
        <caption><strong>{{$detail->title}}</strong></caption>
    @foreach($detail->children as $child)
        <tr>
            <td width="50%">{{$child->key}}</td>
            <td>{{$child->value}}</td>
        </tr>
    @endforeach
    </table>
@endforeach

<br><br><hr><h4>@lang('product.related_products')</h4>
@foreach($related_products as $rp)
    <div>
        <a href="/product/{{$rp->id}}/{{$rp->locale('title')}}">{{$rp->locale('title')}}</a> -
        {{$rp->sellers->sortBy('current_price', SORT_NATURAL)->first()->current_price}} {{Config::get('app.current_currency')->title}}
    </div>
@endforeach

<br><br><hr><h4>@lang('product.comments')</h4>
@foreach($comments as $comment)
    <div>
        <div>@lang('product.comment_by', ['name' => "{$comment->user->first_name} {$comment->user->last_name}"])</div>
        <div>@lang('product.comment_at', ['date' => gdate($comment->created_at)->format('l j F Y')])</div>
        <div>متن: {{$comment->body}}</div>
    </div>
    <hr>
@endforeach

@endsection