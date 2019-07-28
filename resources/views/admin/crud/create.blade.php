@extends('admin.layout')

@section('title', $title)

@section('body')

    <form method="post" action="{{route("$route.$form_action", $form_id)}}" id="create">
        @csrf
        @if($form_id)
            @method('PUT')
        @endif

        @if($inputs)
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">
                            @foreach($inputs as $input)
                                @if(old($input['name']) !== null)
                                    @php($input['value'] = old($input['name']))
                                @endif
                                <div class="form-group">
                                    <label for="{{$input['name']}}">@lang('model.'. $input['name'])</label>
                                    @include('admin.crud.inc.' . $input['type'], $input)
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endif

        @if(isset($multilang))
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header" style="border-bottom: none">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @php($langs = config('global.langs'))
                                @foreach($langs as $lang)
                                    <li class="nav-item">
                                        <a class="nav-link {{current($langs) == $lang ? 'active' : ''}}"
                                           data-toggle="tab"
                                           href="#{{$lang->getId()}}-tab"
                                           aria-selected="true">{{$lang->getNativeName()}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                @foreach($langs as $lang)
                                    <div class="tab-pane fade {{current($langs) == $lang ? 'show active' : ''}}"
                                         id="{{$lang->getId()}}-tab">
                                        @foreach($multilang as $input)
                                            <div class="form-group">
                                                <label
                                                    for="{{$input['name']}}[{{$lang->getId()}}]">@lang('model.'. $input['name'])</label>
                                                @if(isset($input['value']))
                                                    @php($input['get'] = isset($input['get']) ? $input['get'] : $input['name'])
                                                    @php($input['value'] = $input['value']->getTranslate($input['get'], $lang->getId()))
                                                @endif
                                                @if(isset(old($input['name'])[$lang->getId()]))
                                                    @php($input['value'] = old($input['name'])[$lang->getId()])
                                                @endif
                                                @php($input['name'] = $input['name'] . '[' . $lang->getId() . ']')
                                                @include('admin.crud.inc.' . $input['type'], $input)
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info" onsubmit="dropZone()">@lang('crud.save')</button>
                        <a href="{{url()->previous()}}" class="btn btn-default float-left">@lang('crud.return')</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
@endsection

@section('script')
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/i18n/' . app()->getLocale() . '.js')}}"></script>
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/plugins/dropzone/i18n/fa.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;

        $(document).ready(function () {
            $('.select2').select2({
                dir: '{{isRTL(0)}}',
                language: '{{app()->getLocale()}}',
                minimumResultsForSearch: 5
            });
            tinymce.init({
                selector: 'textarea.text-html',
                height: 300,
                theme: "modern",
                plugins: [
                    "autolink link image lists charmap print hr anchor spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print | forecolor backcolor",
                content_css: '{{asset('assets/admin/css/tinymce-reset.css')}}',
                directionality: '{{isRTL(0)}}',
                language: '{{app()->getLocale()}}',
            });
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            iziToast.error(Object.assign({}, iziToastConst, {
                message: '{{ $error }}'
            }));
            @endforeach
            @endif
        });
    </script>
@endsection