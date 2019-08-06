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
                                        class="fa fa-pencil"></i> @lang('crud.edit')</a>
                        @endif
                        @if($crud['destroy'])
                            <button onclick="deleteItem({{$item->id}})" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i> @lang('crud.delete')</button>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <table class="table show-table">
                        <tbody>
                        @foreach($heads as $head)
                            @php($head['get'] = isset($head['get']) ? $head['get'] : $head['name'])
                            <tr class="row">
                                <th class="col-xs-3 col-sm-3">
                                    @if(isset($head['options']['translate_name']) and !$head['options']['translate_name'])
                                        {{$head['name']}}
                                    @else
                                        @lang('model.' . $head['name'])
                                    @endif
                                </th>
                                @php($text = Y::dotObject($item, $head['get'], 1))

                                @if(isset($head['options']['translate_get']) and $head['options']['translate_get'])
                                    @php($text = __('model.' . $text))
                                @endif

                                @php($text .= isset($head['append']) ? $head['append'] : '')
                                @php($text = $text ?: '-')

                                <td class="col-xs-9 col-sm-9">
                                    @if(isset($head['link']))
                                        @php($head['link']['search'] = Y::dotObject($item, $head['link']['search']))
                                        {!! Y::makeRoute($head['link'], $text) !!}
                                    @else
                                        {!! $text !!}
                                    @endif
                                </td>
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