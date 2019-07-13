@extends('admin.layout')

@section('title', $title)

@section('body')
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
                                        <td class="col-xs-9 col-lg-10">{{ \Yasaie\Helper\Y::dotObject($item, $head['get']) }}</td>
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