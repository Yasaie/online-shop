@extends('admin.layout')

@section('title', $title)

@section('body')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-around">

                    <div class="flex-grow-1">
                        @if($crud['create'])
                            <a href="{{route("$route.create")}}" class="btn btn-success btn-sm">
                                <i class="fa fa-file"></i> @lang('crud.add')
                            </a>
                        @endif
                    </div>

                    <div class="badge badge-dark mx-3 py-2 px-sm-3">
                        <span class="font-weight-normal">@lang("crud.results") : </span>
                        <span class="text-warning" style="font-size: 15px">{{$paginate->total()}}</span>
                    </div>

                    <form class="input-group input-group-sm" style="width: 380px;">

                        @if(isset($searchable) and $searchable->count() > 1)
                            <select name="column" class="form-control mx-1" style="max-width: 130px;">
                                <option value="">@lang('crud.all')</option>
                                @foreach($searchable as $key => $srb)
                                    <option value="{{$key}}" {{ request()->column == $key ? 'selected' : '' }}>@lang('model.' . $key)</option>
                                @endforeach
                            </select>
                        @endif

                        <input type="text" name="search" class="form-control float-right"
                               placeholder="@lang('crud.search')" value="{{request()->search}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                        <tr>
                            @foreach($heads as $head)
                                @if(!isset($head['hidden']) or !$head['hidden'])
                                    @if($sortable->contains($head['name']))
                                        <th class="sorting{{$sort == $head['name'] ? ($desc ? '_desc' : '_asc') : ''}}">
                                            @php
                                                $sorting = request()->all();
                                                $sorting['sort'] = $head['name'] .
                                                    (($sort == $head['name']) ? ($desc ? null : '_desc') : ($desc ? '_desc' : null));
                                            @endphp
                                            <a href="?{{http_build_query($sorting)}}">
                                                @lang('model.' . $head['name'])
                                            </a>
                                        </th>
                                    @else
                                        <th>
                                            @lang('model.' . $head['name'])
                                        </th>
                                    @endif
                                @endif
                            @endforeach
                            @canany([$route . '.show', $route . '.edit', $route . '.destroy'])
                                <th class="text-center">@lang('crud.actions')</th>
                            @endcanany
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                @foreach($heads as $head)
                                    @if(!isset($head['hidden']) or !$head['hidden'])
                                        @php
                                            $text = $item->{$head['name']};
                                            if ($text != '') :
                                                if (isset($head['append'])):
                                                    $text .= $head['append'];
                                                endif;
                                            else:
                                                $text = '-';
                                            endif;
                                        @endphp
                                        <td>{!! $text !!}</td>
                                    @endif
                                @endforeach

                                @canany([$route . '.show', $route . '.edit', $route . '.destroy'])
                                    <td class="text-center">
                                        @can($route . '.show')
                                            <a href="{{route($route . '.show', $item->id)}}"
                                               class="btn btn-info btn-sm fa fa-eye"></a>
                                        @endcan
                                        @can($route . '.edit')
                                            <a href="{{route($route . '.edit', $item->id)}}"
                                               class="btn btn-success btn-sm fa fa-pencil"></a>
                                        @endcan
                                        @can($route . '.destroy')
                                            <button onclick="deleteItem({{$item->id}})"
                                                    class="btn btn-danger btn-sm fa fa-trash"></button>
                                        @endcan
                                    </td>
                                @endcanany

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if($paginate->hasPages())
                <div class="d-flex justify-content-center card flex-row">
                    <div class="card-header">
                        {{ $paginate->render() }}
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection