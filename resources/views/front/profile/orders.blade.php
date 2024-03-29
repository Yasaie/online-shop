@extends('front.profile.layout')
@section('body')
        <h2 class="titel_method"> همه سفارش ها</h2>
        <div class="method_body">
            @if($carts)
                <table class="table table_list_broduct mobile_v">
                    <thead>
                    <tr>
                        <th>شماره سفارش</th>
                        <th>تاریخ ثبت سفارش</th>
                        <th>وضعیت</th>
                        <th>مبلغ  کل</th>
                        <th>تعداد کالا</th>
                        <th>جزییات</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{$cart->id}}</td>
                            <td>{{$cart->created_at->format('l j F Y')}}</td>
                            <td class="text-{{$cart->status == 'fail' ? 'danger' : 'success'}}">{{__('inc/cart.' . $cart->status)}}</td>
                            <td>{{$cart->total ? number_format($cart->total) . ' ریال' : '-'}}</td>
                            <td>{{$cart->orders->count()}}</td>
                            <td class="link"><a href="{{route('profile.order', $cart->id)}}">بیشتر</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-warning" role="alert" style="margin: 30px;">
                <strong>
                    کالای موجود نمی باشد
                </strong>
            </div>
            @endif
        </div>
@endsection