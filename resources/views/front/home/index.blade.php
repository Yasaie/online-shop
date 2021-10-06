@extends('front/layout')

@php
    $adv_i = 0;
    $slide_i = 1;
@endphp

@section('content')
    <div id="main-content" class="site-content">
        <div class="container-fluid">
            <div class="row">
                <div id="primary" class="content-area col-md-12">

                    <div id="post-1125" class="post-1125 page type-page status-publish hentry">

                        <div class="page-content">

                            <!--#region Carousel  -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @foreach($carousels as $carousel)
                                        <li data-target="#myCarousel" data-slide-to="{{$carousel->id}}"
                                            class="{{$carousels->first() == $carousel ? 'active' : ''}}"></li>
                                    @endforeach
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @foreach($carousels as $carousel)
                                        <div class="item {{$carousels->first() == $carousel ? 'active' : ''}}">
                                            <img src="{{$carousel->getFullUrl()}}">
                                        </div>
                                    @endforeach

                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <!--#endregion -->

                            <div class="row" style="margin-top: 20px">
                                <div class="col-sm-9 col-sm-pull-3">

                                    @foreach($sliders->slice(0, 4) as $slider)
                                        @if ($cat = $categories->firstWhere('id', $slider))
                                            @include(
                                                'front.component.related',
                                                [
                                                    'component_title' => $cat->title,
                                                    'product_list' => catsProducts($slider)->inRandomOrder()->take(10)->get(),
                                                    'count' => 4
                                                ]
                                            )
                                        @endif

                                        @if($slide_i++ % 2 == 0)
                                            @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 1000, 'height' => 200]))
                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-sm-3 col-sm-push-9">

                                    @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 300, 'height' => 280]))
                                    @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 300, 'height' => 280]))

                                    @if ($cat = $categories->firstWhere('id', $sliders['slider.5']))
                                        @include(
                                            'front.component.related',
                                            [
                                                'component_title' => $cat->title,
                                                'product_list' => catsProducts($sliders['slider.5'])->inRandomOrder()->take(10)->get(),
                                                'count' => 1
                                            ]
                                        )
                                    @endif

                                    @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 300, 'height' => 280]))
                                    @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 300, 'height' => 280]))

                                    @if ($cat = $categories->firstWhere('id', $sliders['slider.6']))
                                        @include(
                                            'front.component.related',
                                            [
                                                'component_title' => $categories->firstWhere('id', $sliders['slider.6'])->title,
                                                'product_list' => catsProducts($sliders['slider.6'])->inRandomOrder()->take(10)->get(),
                                                'count' => 1
                                            ]
                                        )
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach($sliders->slice(6, 4) as $slider)
                                        @if ($cat = $categories->firstWhere('id', $slider))
                                            @include(
                                                'front.component.related',
                                                [
                                                    'component_title' => $cat->title,
                                                    'product_list' => catsProducts($slider)->inRandomOrder()->take(10)->get()
                                                ]
                                            )
                                        @endif
                                        @if($slide_i++ % 2 == 0)
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 700, 'height' => 280]))
                                                </div>
                                                <div class="col-sm-6">
                                                    @include('front.component.figure', array_merge($advs[$adv_i++], ['width' => 700, 'height' => 280]))
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <!-- .entry-content -->

                    </div>

                </div>

            </div>
        </div>
        <!-- .content-area -->
    </div>

@endsection
