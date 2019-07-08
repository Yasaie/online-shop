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
                            <table class="table table-bordered">
                                <tbody>
                                @foreach($heads as $head)
                                    @php($head['get'] = isset($head['get']) ? $head['get'] : $head['name'])
                                    <tr>
                                        <th class="col-xs-3 col-lg-2">@lang('model.' . $head['name'])</th>
                                        <td class="col-xs-9 col-lg-10">{{ dotObject($item, $head['get']) }}</td>
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

@endsection