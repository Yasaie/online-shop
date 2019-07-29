<div class="col-lg-4 col-md-6 info_box_product detail">

    <h2 class="name_product">{{$product->title}}</h2>

    <div class="category_product">
        دسته بندی :
        @foreach($product->category->tree as $category)
            <a href="/category/{{$category->id}}">{{$category->title}}</a>
            @if(last($product->category->tree) != $category)
                /
            @endif
        @endforeach
    </div>

    <div style="margin-top: 10px" id="rateYo_product" data-rateyo-rating="{{$rates}}"></div>
    <div class="category_product  small" id="add_star_btn"><a>ثبت ستاره به محصول</a></div>


    @if(! ($highlightes = $product->details->where('highlighted', 1))->isEmpty())
        <ul class="property_list">
            <span class="titlee"> ویژگی محصول</span>
            @foreach($highlightes as $detail)
                <li class="product_property">
                    <span class="titel_property">{{$detail->detailKey->title}} : </span>
                    <span class="value_property">{{$detail->detailValue->title}}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>