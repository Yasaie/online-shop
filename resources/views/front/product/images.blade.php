<div class="col-lg-4 col-md-6 img_box_product">

    <div class="image_main" id='ex1'>
        <img id="main_image_product"
             src="{{$product->getFirstMedia('images')->getFullUrl()}}">
    </div>

    <div class="mini_img_box">
        @foreach($product->getMedia('images') as $media)
            <a class="im" src_big="{{$media->getFullUrl()}}">
                <img src="{{$media->getFullUrl('small')}}">
            </a>
        @endforeach

    </div>
</div>