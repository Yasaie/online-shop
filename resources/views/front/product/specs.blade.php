<div class="row body_specifications" id="sp_productt">

    <div class="col-lg-12 title_sp"> مشخصات فنی</div>

    @foreach($product_details->sortBy('weight') as $detail)
        <div class="sp_item col-lg-12 row">

            <h4 class="col-lg-12  title_sp_min">{{$detail->title}} </h4>

            @foreach($detail->children as $child)
                <div class="col-lg-12 ">
                                    <span
                                        class="col-lg-2 sp_item_name col-md-4 col-sm-5 col-xs-12">{{$child->key}}</span>
                    <span class="col-lg-8 col-md-6 col-sm-5 col-xs-12  sp_val">{{$child->value}}</span>
                </div>
            @endforeach
        </div>
    @endforeach

</div>