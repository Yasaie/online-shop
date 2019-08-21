<div class="result_body">

    <div class="sort">
        <i class="fa icon fa-sort-amount-asc" aria-hidden="true"></i>
        <span class="sort_titel">مرتب سازی بر اساس : </span>
        <a class="sort_name active_sort_name">پربازدید ترین</a>
        <a class="sort_name">بیشترین تخفیف</a>
        <a class="sort_name">ارزان ترین</a>
        <a class="sort_name">گران ترین</a>
    </div>

    <div id="resalts" class="row">

        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt" v-for="product in products">
            <a :href="product.url" class="image_box">
                <img :src="product.image ? product.image : '{{asset('assets/front/image/no-default-thumbnail.png')}}'">
            </a>
            <div class="info_box">
                <div class="resalt_name">
                    <a :href="product.url">@{{ product.title }}</a>
                </div>

                <div v-if="product.price">
                    <div class="resalt_off" v-if="product.prev_price > 0">
                        <span>@{{ product.off_percent }}%</span>
                        <del>@{{ product.prev_price }}</del>
                    </div>

                    <div class="resalt_price">
                        <a>
                            <span>@{{ product.price }}</span>
                            <span class="unit">{{Config::get('app.current_currency')->title}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
