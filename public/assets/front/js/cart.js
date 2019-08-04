var app_cart = new Vue({
    el: '#app-cart',
    data: {
        orders: [],
        total: {
            count: 0,
            price: 0,
            prev: 0,
            off: 0,
            percent: 0
        }
    },
    mounted: function() {
        _this = this;
        $.ajax({
            url: app_url + '/cart/list',
        }).done(function (result) {
            _this.orders = result;
        });
        this.computeTotal();
    },
    watch: {
        orders: {
            handler: function () {
                this.computeTotal();
            },
            deep: true
        },
    },
    methods: {
        commaPrice: function commaPrice(price, fix) {
            if (fix === undefined) fix = 0;
            return price.toFixed(fix).replace(/\d(?=(\d{3})+(\.|$))/g, '$&,');
        },
        computeTotal: function () {
            _this = this;
            _this.total = {
                count: 0,
                price: 0,
                prev: 0
            };
            $.each(this.orders, function () {
                this.price = this.price.replace(',', '');
                this.prev_price = this.prev_price.replace(',', '');
                _this.total.count += this.quantity;
                _this.total.price += this.price * this.quantity;
                _this.total.prev += (this.prev_price > this.price
                    ? this.prev_price
                    : this.price)
                    * this.quantity;
            });
            _this.total.off = _this.total.prev - _this.total.price;
            _this.total.percent = Math.floor(100 - ((_this.total.price * 100) / _this.total.prev));
            if (isNaN(_this.total.percent))
                _this.total.percent = 0;
        },
        productPage: function (id) {
            return product_page.replace('product_id', id);
        },
        updateQuantity: function (id, quantity) {
            $.ajax({
                url: app_url + '/cart/quantity',
                method: 'POST',
                data: {
                    _token: csrf_token,
                    id: id,
                    quantity: quantity
                }
            });
        },
        deleteOrder: function (id) {
            var _this = this;
            $.ajax({
                url: app_url + '/cart/order/' + id,
                method: 'POST',
                data: {
                    _token: csrf_token,
                    _method: 'DELETE'
                }
            }).done(function (r) {
                if (r.result)
                    _this.$delete(_this.orders, id);
            });
        }
    }
});