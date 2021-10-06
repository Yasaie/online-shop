<div class="col-lg-4 col-md-6 img_box_product">

    @php(
        $image = $product->getFirstMedia('images')
            ? $product->getFirstMedia('images')->getFullUrl()
            : asset('assets/front/image/default-thumbnail.jpg')
    )

    <div class="image_main" id='ex1'>
        <img id="main_image_product" alt="{{ $product->title }}"
             src="{{$image}}">
    </div>

    @if($medias = $product->getMedia('images'))
    <div class="mini_img_box">
        @foreach($medias as $media)
            <a class="im" src_big="{{$media->getFullUrl()}}">
                <img src="{{$media->getFullUrl('small')}}" alt="{{ $product->title }}">
            </a>
        @endforeach
    </div>
    @endif
</div>