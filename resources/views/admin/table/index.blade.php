@extends('admin.layout')

@section('title', 'table')

@section('body')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">داشبورد</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">داشبورد ورژن 2</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">جدول ریسپانسیو</h3>

                                <div class="card-tools">
                                    <form class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                   placeholder="جستجو" value="{{Request::get('search')}}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        @foreach($heads as $head)
                                        <th>@lang('model.' . $head)</th>
                                        @endforeach
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        @foreach($heads as $head)
                                        <td>{{dotObject($item, $head)}}</td>
                                        @endforeach
                                        <td class="text-center">
                                            <a href="" class="btn btn-info btn-sm fa fa-eye"></a>
                                            <a href="" class="btn btn-success btn-sm fa fa-pencil"></a>
                                            <a href="" class="btn btn-danger btn-sm fa fa-trash"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection