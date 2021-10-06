new Vue({
    el: '#results',
    data: {
        sort: typeof q_param.sort === "string" ? q_param.sort : 'visitor',
        dir: q_param.dir ? q_param.dir : 'desc',
        search: q_param.search ? q_param.search : null,
        for_sale: q_param.for_sale ? q_param.for_sale : 0,
        filters: q_param.filters ? q_param.filters : [],
        pages: {
            total: 0,
            current: q_param.page ? q_param.page : 0,
            last: 1
        },
        products: {}
    },
    mounted: function () {
        this.getProducts()
    },
    watch: {
        for_sale: function () {
            this.getProducts()
        }
    },
    methods: {
        sortProducts: function (name, dir) {
            this.sort = name;
            this.dir = dir;
            this.pages.current = 1;

            this.getProducts();
        },
        getProducts: function () {
            var request = {
                sort: this.sort,
                dir: this.dir,
                search: this.search,
                for_sale: this.for_sale,
                filters: this.filters,
                page: this.pages.current
            };
            var _this = this;

            $.ajax({
                url: app_url + '/api/product.json',
                data: Object.assign({
                    category: category
                }, request),
                async: false
            }).done(function (r) {
                _this.products = r.products;
                _this.pages = r.pages;

                var query = {};
                $.each(request, function (k, v) {
                    if (v) query[k] = v;
                });
                window.history.pushState('','','?' + $.param(query));
            });
        },
        setFilter: function () {
            var filters = $('.filter_checkbox');
            var list = [];
            var i = 0;

            filters.each(function () {
                list[i] = [];
                $('[type=checkbox]:checked', this).each(function () {
                    list[i].push($(this).data('id'))
                });
                i++;
            });
            this.filters = list;
            this.pages.current = 1;

            this.getProducts();
            this.scrollTop();
        },
        navigate: function (p) {
            this.pages.current = p;
            this.getProducts();
            this.scrollTop();
        },
        scrollTop: function () {
            var results = document.getElementById('results');

            if (results.offsetTop + 100 < window.scrollY) {
                results.scrollIntoView();
            }
        }
    }
});