<figure class="wpb_wrapper mb-7">
    <a href="{{ (isset($link) and $link) ? $link : '#' }}">
        <div class="vc_single_image-wrapper">
            <img src="{{ (isset($image) and $image) ? $image : asset("assets/front/image/{$width}x{$height}.jpg") }}"
                 style="{{$height ? "height: {$height}px;" : ''}}width: 100%;object-fit: cover;"
                 alt="{{ isset($title) ? $title : '' }}">
        </div>
    </a>
</figure>
