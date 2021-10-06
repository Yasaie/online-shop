<div class="result_body">

    <div class="sort">
        <i class="fa icon fa-sort-amount-asc" aria-hidden="true"></i>
        <span class="sort_titel">مرتب سازی بر اساس : </span>
        <span class="sort_name" :class="(sort == 'visitor' && dir == 'desc') ? 'active_sort_name' : ''"
              @click="sortProducts('visitor', 'desc')">پربازدیدترین</span>
        <span class="sort_name" :class="(sort == 'off_percent' && dir == 'desc') ? 'active_sort_name' : ''"
              @click="sortProducts('off_percent', 'desc')">بیشترین تخفیف</span>
        <span class="sort_name" :class="(sort == 'rate' && dir == 'desc') ? 'active_sort_name' : ''"
              @click="sortProducts('rate', 'desc')">محبوب ترین</span>
        <span class="sort_name" :class="(sort == 'price' && dir == 'asc') ? 'active_sort_name' : ''"
              @click="sortProducts('price', 'asc')">ارزان‌ترین</span>
        <span class="sort_name" :class="(sort == 'price' && dir == 'desc') ? 'active_sort_name' : ''"
              @click="sortProducts('price', 'desc')">گران‌ترین</span>
        <span class="sort_name" :class="(sort == 'updated_at' && dir == 'desc') ? 'active_sort_name' : ''"
              @click="sortProducts('updated_at', 'desc')">جدیدترین</span>
    </div>

    <div id="resalts" class="row">

        <div class="col-lg-3 coi-md-3 col-sm-4 col-xs-12 resalt" v-for="product in products">
            <a :href="product.url" class="image_box">
                <img :src="product.image ? product.image : '{{asset('assets/front/image/no-default-thumbnail.png')}}'">
            </a>

            <div class="info_box d-flex flex-column">
                <div class="resalt_name">
                    <a :href="product.url">@{{ product.title }}</a>
                </div>

                <div v-if="product.price" class="product_price">
                    <div class="resalt_off" v-if="product.off_percent > 0">
                        <del>@{{ product.prev_price }}</del>
                        <span>@{{ product.off_percent }}%</span>
                    </div>

                    <div class="resalt_price">
                        <a>
                            <span>@{{ product.price }}</span>
                            <span class="unit">{{Config::get('app.current_currency')->title}}</span>
                        </a>
                    </div>
                </div>

                <div v-if="product.add_to_cart">
                    <a :href="'{{route('cart.add', 'id')}}'.replace('id', product.add_to_cart)" rel="nofollow"
                       style="color: #fff" class="btn btn-block btn-primary">
                        افزودن به سبد خرید
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="row" v-if="pages.last > 1">
    <ul class="pagination" role="navigation" style="display: flex;flex-direction: row-reverse;justify-content: center">

        <li class="page-item" :class="pages.last <= pages.current ? ' disabled' : ''">
            <span class="page-link" v-if="pages.last <= pages.current">@lang('pagination.last')</span>
            <a class="page-link" href="javascript:"
               rel="next" v-else @click="navigate(pages.last)">@lang('pagination.last')</a>
        </li>

        <li class="page-item" :class="pages.last <= pages.current ? ' disabled' : ''">
            <span class="page-link" v-if="pages.last <= pages.current">@lang('pagination.next')</span>
            <a class="page-link" href="javascript:"
               rel="next" v-else @click="navigate(pages.current+1)">@lang('pagination.next')</a>
        </li>

        <li class="page-item active" aria-current="page">
            <span class="page-link">صفحه @{{ pages.current }} از @{{ pages.last }}</span>
        </li>

        <li class="page-item" :class="pages.current <= 1 ? ' disabled' : ''">
            <span class="page-link" v-if="pages.current <= 1">@lang('pagination.previous')</span>
            <a class="page-link" href="javascript:" rel="previous"
               v-else @click="navigate(pages.current-1)">@lang('pagination.previous')</a>
        </li>

        <li class="page-item" :class="pages.current <= 1 ? ' disabled' : ''">
            <span class="page-link" v-if="pages.current <= 1">@lang('pagination.first')</span>
            <a class="page-link" href="javascript:" rel="previous"
               v-else @click="navigate(1)">@lang('pagination.first')</a>
        </li>
    </ul>
</div>