@extends('admin.layout')

@section('title', $title)

@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @php($langs = config('global.langs'))
                                @foreach($langs as $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{current($langs) == $lang ? 'active' : ''}}" data-toggle="tab" href="#{{$lang->getId()}}-tab" aria-selected="true">{{$lang->getNativeName()}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @foreach($langs as $lang)
                                <div class="tab-pane fade {{current($langs) == $lang ? 'show active' : ''}}" id="{{$lang->getId()}}-tab">
                                    <form role="form">
                                        <div class="card-body row">
                                            <label for="exampleInputEmail1" class="col-3">عنوان</label>
                                            <input type="email" class="form-control col-9" id="exampleInputEmail1">
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header">

                            <form role="form">
                                <div class="card-body row">
                                    <label for="exampleInputEmail1" class="col-3">عنوان</label>
                                    <input type="email" class="form-control col-9" id="exampleInputEmail1">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection