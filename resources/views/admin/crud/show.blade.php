@extends('admin.layout')

@section('title', $title)

@section('body')

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <div class="form-group float-left">
                        @if($crud['edit'])
                            <a href="{{route("$route.edit", $item->id)}}" class="btn btn-success btn-sm"><i
                                    class="fa fa-pencil"></i> ویرایش</a>
                        @endif
                        @if($crud['destroy'])
                            <button onclick="deleteItem({{$item->id}})" class="btn btn-danger btn-sm"><i
                                    class="fa fa-trash"></i> حذف</button>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                        @foreach($heads as $head)
                            @php($head['get'] = isset($head['get']) ? $head['get'] : $head['name'])
                            <tr>
                                <th class="col-xs-3 col-lg-2">@lang('model.' . $head['name'])</th>
                                @if(isset($head['link']))
                                    @php($head['link']['search'] = Y::dotObject($item, $head['link']['search']))
                                    <td class="col-xs-9 col-lg-10">{!! Y::makeRoute($head['link'], Y::dotObject($item, $head['get'])) !!}</td>
                                @else
                                    <td class="col-xs-9 col-lg-10">{!! Y::dotObject($item, $head['get'], 1) !!}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('assets/admin/js/custom.min.js')}}"></script>
@endsection