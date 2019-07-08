@extends('admin.layout')

@section('title', 'table')

@section('body')

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
                                           placeholder="جستجو" value="{{$search}}">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                @foreach($heads as $head)
                                    @if(isset($head['visible']) and $head['visible'])
                                <th class="sorting{{$sort == $head['name'] ? ($desc ? '_desc' : '_asc') : ''}}">
                                    @php
                                        $sorting = $query;
                                        $sorting['sort'] = $head['name'];
                                        $sorting['desc'] = $desc ? null : 1;
                                    @endphp
                                    <a href="?{{http_build_query($sorting)}}">
                                    @lang('model.' . $head['name'])
                                    </a>
                                    @endif
                                </th>
                                @endforeach
                                <th class="text-center">عملیات</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($items as $item)
                            <tr>
                                @foreach($heads as $head)
                                    @if(isset($head['visible']) and $head['visible'])
                                    <td>{{ $item->{$head['name']} }}</td>
                                    @endif
                                @endforeach
                                <td class="text-center">
                                    @php($current_route = str_replace('index', '', Route::currentRouteName()))
                                    <a href="{{route($current_route . 'show', $item->id)}}" class="btn btn-info btn-sm fa fa-eye"></a>
                                    <a href="{{route($current_route . 'edit', $item->id)}}" class="btn btn-success btn-sm fa fa-pencil"></a>
                                    <a href="" class="btn btn-danger btn-sm fa fa-trash"></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @include('admin.crud.pagination')

            </div>
        </div>

    </div>
</section>

@endsection