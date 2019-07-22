@extends('admin.layout')

@section('title', $title)

@section('body')

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    @if($crud['create'])
                    <a href="{{route("$route.create")}}" class="btn btn-success btn-sm"><i class="fa fa-file"></i> @lang('crud.add')</a>
                    @endif
                        <br>
                    <div class="card-tools">
                        <form class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search" class="form-control float-right"
                                   placeholder="@lang('crud.search')" value="{{$search}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped table-hover dataTable">
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
                                    <th class="text-center">@lang('crud.actions')</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                @foreach($heads as $head)
                                    @if(isset($head['visible']) and $head['visible'])
                                        <td>{{ $item->{$head['name']} ?: '-' }}</td>
                                    @endif
                                @endforeach
                                <td class="text-center">
                                    @php($current_route = str_replace('index', '', Route::currentRouteName()))
                                    @if($crud['show'])
                                    <a href="{{route($current_route . 'show', $item->id)}}"
                                       class="btn btn-info btn-sm fa fa-eye"></a>
                                    @endif
                                    @if($crud['edit'])
                                    <a href="{{route($current_route . 'edit', $item->id)}}"
                                       class="btn btn-success btn-sm fa fa-pencil"></a>
                                    @endif
                                    @if($crud['destroy'])
                                    <button onclick="deleteItem({{$item->id}})" class="btn btn-danger btn-sm fa fa-trash"></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('Paginate::pagination')

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('assets/admin/js/custom.min.js')}}"></script>
@endsection