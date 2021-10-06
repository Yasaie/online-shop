@extends('front.profile.layout')

@section('body')
    <h2 class="titel_method">پروفایل حساب کاربری</h2>
    <div class="method_body">

        <div class="profile row">

            <form class="profile_form col-lg-4" method="POST" id="profile-form" action="{{ route("profile.update") }}">
                <p>برای تغییر مشخصات فردی اطلاعات قدیمی را پاک کرده و اطلاعات جدید را وارد کرده و دکمه ویرایش
                    اطلاعات را کلیک کنید </p>

                @csrf

                <div class="form-group">
                    <label for="first_name">@lang('model.first_name')</label>
                    <input value="{{Auth::user()->first_name ?: old('first_name')}}" type="text"
                           class="form-control" name="first_name" id="first_name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">@lang('model.last_name')</label>
                    <input value="{{Auth::user()->last_name ?: old('first_name')}}" type="text" class="form-control"
                           name="last_name"
                           id="last_name" required>
                </div>

                <div class="form-group">
                    <label for="email">@lang('model.email')</label>
                    <input value="{{Auth::user()->email}}" disabled type="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="country">کشور</label>
                    <select class="form-control" v-model="country" name="country" id="country" required>
                        <option :value="item.id" v-for="item in country_list">@{{ item.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="state">استان</label>
                    <select class="form-control" v-model="state" name="state" id="state" required>
                        <option :value="item.id" v-for="item in state_list">@{{ item.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="city">شهر</label>
                    <select class="form-control" v-model="city" name="city" id="city" required>
                        <option :value="item.id" v-for="item in city_list">@{{ item.name }}</option>
                    </select>
                </div>

                @foreach($profiles as $profile)
                    @php
                        $user_profile = \Yasaie\Support\Yalp::dot(
                            Auth::user(),
                            'profile().find($).pivot.data',
                            [$profile->id]
                        );
                        $cruder = [
                            'name' => "profile[$profile->name]",
                            'value' => $user_profile,
                            'options' => [
                                'required' => $profile->required
                            ]
                        ];
                    @endphp
                    <div class="form-group">
                        <label for="profile[{{ $profile->name }}]">@lang("model.{$profile->name}")</label>
                        @include('Cruder::component.' . $profile->type, $cruder)
                    </div>

                @endforeach

                <button type="submit" class="btn btn-success">ویرایش اطلاعات</button>

            </form>

            <form class="change_pass col-lg-4" action="{{ route('profile.password') }}" method="post">

                <p>برای تغییر رمز عبور در قسمت مشخص شده رمز عبور جدید و رمز عبور قدیمی خود را وارد کرده و دکمه تغییر
                    پسورد کلیک کنید </p>

                @csrf

                <div class="form-group">
                    <label for="old_password">پسورد قبلی</label>
                    <input type="password" class="form-control" name="old_password" id="old_password" required>
                </div>

                <div class="form-group">
                    <label for="password">پسورد جدید</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">پسورد تکرار جدید</label>
                    <input type="password" class="form-control" name="password_confirmation"
                           id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-success">تغییر پسورد</button>

            </form>
        </div>

    </div>
@endsection

@section('footer_include')
    <script>
        new Vue({
            el: '#profile-form',
            data: {
                country: {{ dot(Auth::user(), 'country.id') ?: 'null' }},
                state: {{ dot(Auth::user(), 'state.id') ?: 'null'}},
                city: {{ dot(Auth::user(), 'city.id') ?: 'null'}},
            },
            computed: {
                country_list: function () {
                    return this.getList('country');
                },
                state_list: function () {
                    return this.getList('state', 'country');
                },
                city_list: function () {
                    return this.getList('city', 'state');
                }
            },
            methods: {
                getList: function (name, get) {
                    get = (get === undefined) ? '' : this[get];
                    var list = {};

                    $.ajax({
                        type: "get",
                        url: app_url + "/api/address/" + name + "/" + get,
                        async: false
                    }).done(function (r) {
                        list = r;
                    });

                    return list;
                }
            }
        });
    </script>
@endsection