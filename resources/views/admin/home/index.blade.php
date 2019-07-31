@extends('admin.layout')

@section('title', 'داشبورد')

@section('body')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>سفارشات جدید</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $sellers_count }}<sup style="font-size: 20px"></sup></h3>

                    <p>تعداد فروشندگان</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('admin.user.user.index')}}/?search=seller&column=role" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users_count }}</h3>

                    <p>کاربران ثبت شده</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admin.user.user.index')}}" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$products_visits}}</h3>

                    <p>بازدید از کالاها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('admin.report.list')}}" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
@endsection