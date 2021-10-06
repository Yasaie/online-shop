<div class="row body_info" id="info_productt">
    <div class="col-lg-12 titel_info">
        <h2>نقد و بررسی اجمالی</h2>
        <span>{{ $product->title }}</span>
    </div>

    <div class="col-lg-2 image_box">
        <img src="{{ asset('assets/front/image/pen.svg') }}" >
    </div>

    <div class="col-lg-10 ">
        <p class="p_info">
            {!! $product->description !!}
        </p>
    </div>
</div>