<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'fa' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{setting('site.title')}} - @yield('page-title')</title>
</head>
<body>
<h1><a href="{{url('/')}}">{{setting('site.title')}}</a></h1>
<hr>
@foreach(\App\Language::get() as $lang)
    <a href="/lang/{{$lang->id}}">{{$lang->name}}</a>
@endforeach
|
@foreach($currencies as $currency)
    <a href="/currency/{{$currency->key}}">{{$currency->locale('name')}}</a>
@endforeach
<hr>

@include('front.layout.navbar')
<hr>

@yield('body')

<br><br>
<h3>فوتر</h3>
{!!setting('footer.block1.title')!!}
{!!setting('footer.block1.body')!!}

{!!setting('footer.block2.title')!!}
{!!setting('footer.block2.body')!!}

</body>
</html>