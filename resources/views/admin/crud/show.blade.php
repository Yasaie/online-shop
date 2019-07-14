@extends('admin.layout')

@section('title', $title)

@section('body')

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <div class="form-group float-left">
                    <a href="{{route("$route.edit", $item->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> ویرایش</a>
                    <a href="{{route("$route.destroy", $item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> حذف</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                        @foreach($heads as $head)
                            @php($head['get'] = isset($head['get']) ? $head['get'] : $head['name'])
                            <tr>
                                <th class="col-xs-3 col-lg-2">@lang('model.' . $head['name'])</th>
                                <td class="col-xs-9 col-lg-10">{{ \Yasaie\Helper\Y::dotObject($item, $head['get']) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection