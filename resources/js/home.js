import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
const rateYo = require('rateyo');
import '../../node_modules/rateyo/min/jquery.rateyo.min.css';
const select2 = require('select2');
import '../../node_modules/select2/dist/css/select2.min.css';

(function () {

    $(document).ready(function () {
        $('.home-large-slider').owlCarousel({
            items: 1,
            rtl: true,
            dots: true,
            nav: true,
            autoplay: true,
            loop: true
        });

        $('.products-slider').each(function () {
            $(this).owlCarousel({
                items: $(this).data('items'),
                rtl: true,
                dots: false,
                nav: true,
                autoplay: false,
                loop: true
            });
        });

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });
    });

    $("#special-offers .list li").click(function () {
        $("#special-offers .list li").removeClass('active');
        $(this).addClass('active');
        $("#special-offers .offer section").hide();
        $('#special-offers .offer section[data-name="' + $(this).data('name') + '"]').css('display', 'flex');
    });

    $('.product-rate-static').rateYo({
        readOnly: true,
        starWidth: "20px"
    });

    $('.tabs').each(function () {
        let _thisTabs = $(this);
        $('ul li').click(function () {
            $('ul li').removeClass('active');
            $(this).addClass('active');
            _thisTabs.find('.sections section').hide();
            _thisTabs.find('.sections section[data-tab="' + $(this).data('tab') + '"]').show();
        });
    });

    $('.number-field').each(function () {
        let field = $(this).find('input');
        let value = parseInt(field.val());
        let min = parseInt(field.data('min'));
        let max = parseInt(field.data('max'));
        if(typeof field.val() != "number") {
            field.val(min);
        }
        if (value < min || value > max) {
            field.val(min);
        }
        let increase = function () {
            if (parseInt(field.val()) + 1 <= max) {
                field.val(parseInt(field.val()) + 1);
            }
        };
        let decrease = function () {
            if (parseInt(field.val()) - 1 >= min) {
                field.val(parseInt(field.val()) - 1);
            }
        };
        $(this).find('[data-increase]').click(increase);
        $(this).find('[data-decrease]').click(decrease);
        field.keydown(function (e) {
            switch (e.which) {
                case 38:
                    increase();
                    break;
                case 40:
                    decrease();
                    break;
            }
        });
    });

})();