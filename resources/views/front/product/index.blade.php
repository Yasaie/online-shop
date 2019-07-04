@extends('front.layout.index')
@section('page-title', $product->title)

@section('body')

<h3><a href="/product/{{$product->id}}/{{$product->title}}">{{$product->title}}</a></h3>

<img src="{{$product->getFirstMedia('images')->getFullUrl()}}" alt="">
@foreach($product->getMedia('images') as $media)
    <img src="{{$media->getFullUrl('small')}}" alt="">
@endforeach

<div>
    @lang('product.category'):
    @foreach($product_cats->reverse() as $category)
        @if($category)
            <a href="/category/{{$category->id}}">{{$category->title}}</a> /
        @endif
    @endforeach
    {{$product->title}}
</div>

<div>@lang('product.rates'): {{$rates}}</div>
@if($first_seller->prev_price)
    <div>
        <del>{{$first_seller->previous_price}} {{Config::get('app.current_currency')->title}}</del> -
        <span>{{getPercentage($first_seller->previous_price, $first_seller->current_price)}}%</span>
    </div>
@endif
{{$first_seller->current_price}} {{Config::get('app.current_currency')->title}}
<br>
<div>
    <h4>ویژگی‌ها:</h4>
    @foreach($product->details->where('highlighted', 1) as $detail)
        <div>{{$detail->detailKey->title}} : {{$detail->detailValue->title}}</div>
    @endforeach
</div>

<br><br><hr><h4>@lang('product.sellers')</h4>
@foreach($sellers as $seller)
    @php($seller->rates = $seller->user
            ->products
            ->unique()
            ->avg('product_rate'))
    <div>
        <span>تعداد: {{$seller->amount}}</span> -
        <span>امتیاز: {{$seller->rates}}</span> -
        @if($seller->sellerService)
        <span> نوع: {{$seller->sellerService->title}}</span> -
        @endif
        <span>{{$seller->user->first_name}} {{$seller->user->last_name}}</span> -
        <bdi>
        @if($seller->prev_price)
            <del>{{$seller->previous_price}} {{Config::get('app.current_currency')->title}}</del> -
            <span>{{getPercentage($seller->previous_price, $seller->current_price)}}%</span> -
        @endif
        {{$seller->current_price}} {{Config::get('app.current_currency')->title}}
        </bdi>
    </div>
@endforeach

<br><br><hr><h4>@lang('product.description')</h4>
<div>{{$product->description}}</div>

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
    @php($rp->seller = $rp->sellers->sortBy('current_price', SORT_NATURAL)->first())
    <div>
        <img src="{{$rp->getFirstMedia('images')->getFullUrl('small')}}" alt="{{$rp->title}}">
        <a href="/product/{{$rp->id}}/{{$rp->title}}">{{$rp->title}}</a> -
        @if($rp->seller->prev_price)
            <del>{{$rp->seller->previous_price}} {{Config::get('app.current_currency')->title}}</del> -
            <span>{{getPercentage($rp->seller->previous_price, $rp->seller->current_price)}}%</span> -
        @endif
        {{$rp->seller->current_price}} {{Config::get('app.current_currency')->title}}
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