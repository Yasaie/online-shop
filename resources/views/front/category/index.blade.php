@extends('front.layout')

@section('header_include')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <script>
        $(function () {
            jQuery('.grid_').masonry({
                itemSelector: '.category_item',
                gutterWidth: 30,
                originLeft: {{!isRTL()}}
            });

        });
    </script>
@endsection

@section('content')

    <div id="container_category" class="container-fluid">

        <div class="row grid_">

            @foreach($categories->where('depth', 1) as $category)
                <div class="col-lg-4 category_item">

                    <div class="category_item_body">

                        <div class="image_box">
                            <a href="{{route('category', $category->id)}}">
                                <img src="{{$category->getFirstMedia('image')
                                    ? $category->getFirstMedia('image')->getFullUrl('small')
                                    : asset('assets/front/image/no-default-thumbnail.png')}}" alt="">

                                <h2 class="titel_of_category">{{$category->title}}</h2>
                            </a>
                        </div>

                        @if(isset($category->children))
                        <ul class="list_of_titel">
                            @foreach($category->children as $category)
                            <li>
                                <a href="{{route('category', $category->id)}}">{{$category->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection