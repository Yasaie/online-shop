@extends('front.profile.layout')

@section('body')
    <h2 class="titel_method">فرم درخواست فروشگاه</h2>

    <div class="method_body">

        <div class="row seller">

            <form class="col-lg-5 seller_form" id="seller-form" method="post"
                  action="{{ route('profile.seller.update') }}">

                @csrf

                <div class="form-group">
                    <div class="form-check">
                        <h4>چه نوع فروشنده ای هستید ؟</h4>
                        <div class="radio">
                            <label>
                                <input v-model="person_type" value="legal_person" type="radio"
                                       name="profile[person_type]">
                                <span><i class="fa fa-address-card" aria-hidden="true"></i>
                                                                        شخص حقوقی</span>
                            </label>
                            <label>
                                <input v-model="person_type" value="natural_person" type="radio"
                                       name="profile[person_type]">
                                <span> <i class="fa fa-user-o" aria-hidden="true"></i>
                                                                        شخص حقیقی</span>
                            </label>
                        </div>
                    </div>
                </div>
                <hr>

                <div>
                    <span class="title_form">اطلاعات شخصی</span>
                    @foreach($form[0] as $input)
                        <div class="form-group">
                            <label for="{{ $input['name'] }}">@lang('model.' . (isset($input['locale']) ? $input['locale'] : $input['name']))</label>
                            @include('Cruder::component.' . $input['type'], $input)
                        </div>
                    @endforeach
                </div>
                <hr>

                <div>
                    <span class="title_form">اطلاعات تماس</span>
                    @foreach($form[1] as $input)
                        <div class="form-group">
                            <label for="{{ $input['name'] }}">@lang('model.' . (isset($input['locale']) ? $input['locale'] : $input['name']))</label>
                            @include('Cruder::component.' . $input['type'], $input)
                        </div>
                    @endforeach
                </div>
                <hr>

                <div v-if="person_type == 'legal_person'">
                    <span class="title_form">اطلاعات شرکت</span>

                    @foreach($form[2] as $input)
                        <div class="form-group">
                            <label for="{{ $input['name'] }}">@lang('model.' . (isset($input['locale']) ? $input['locale'] : $input['name']))</label>
                            @include('Cruder::component.' . $input['type'], $input)
                        </div>
                    @endforeach
                </div>
                <hr>

                <div>
                    <span class="title_form">اطلاعات تجاری</span>

                    @foreach($form[3] as $input)
                        <div class="form-group">
                            <label for="{{ $input['name'] }}">@lang('model.' . (isset($input['locale']) ? $input['locale'] : $input['name']))</label>
                            @include('Cruder::component.' . $input['type'], $input)
                        </div>
                    @endforeach
                </div>
                <hr>

                <div>
                    <span class="title_form">مدارک</span>

                    <div class="form-group">

                        <div id="loadFileXml" class="btn bg-success"
                             onclick="document.getElementById('file').click();">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            بار گذاری تصویر کارت ملی
                        </div>

                        <input type="file" style="display:none;" id="file" name="file"/>

                    </div>

                    <div class="form-group">

                        <div id="loadFileXml" class="btn bg-success"
                             onclick="document.getElementById('file').click();">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            بار گذاری قرار داد
                        </div>

                        <input type="file" style="display:none;" id="file" name="file"/>

                    </div>

                    <hr>
                </div>
                <button type="submit" class="btn btn-success">بارگزاری اطلاعات</button>
            </form>

        </div>
    </div>

@endsection

@section('header_include')
    <link rel="stylesheet" href="{{asset('vendor/cruder/plugins/select2/select2.min.css')}}">
    <script type="text/javascript" src="{{asset('vendor/cruder/plugins/select2/select2.full.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('vendor/cruder/plugins/select2/i18n/' . app()->getLocale() . '.js')}}"></script>
    <script>
        var select2_array = {
            dir: '{{isRTL(0)}}',
            language: '{{app()->getLocale()}}',
            minimumResultsForSearch: 5,
        };
        $(document).ready(function () {
            $('.select2').select2(select2_array);
        });
    </script>
@endsection

@section('footer_include')
    <script>
        $(function () {
            $('input[type=text]').inputmask();
            $("#company_show")
                .hide()
                .find('input,textarea')
                .attr('disabled', 'disabled');
        });

        new Vue({
            el: '#seller-form',
            data: {
                person_type: 'natural_person'
            }
        })
    </script>
@endsection