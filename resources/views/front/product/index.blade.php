@extends('front.layout')

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        function load_image(url_image) {
            $("#main_image_product").attr("src", url_image);

            $('#ex1').zoom();
            setTimeout(() => {
                $('#ex1').zoom();

            }, 1000);
            setTimeout(() => {
                $('#ex1').zoom();

            }, 1000);
        }
        $(function () {
            $('#ex1').zoom();
            $(".im").click(function (e) {

                load_image($(e.target).attr("src_big"));
            });
        });
        $(function () {
            $(".rateYo_saler").each(function (indexInArray, valueOfElement) {
                $(this).rateYo({
                    rating: parseFloat($(this).attr("number_of_star")),
                    readOnly: true,
                    starWidth: "15px",
                    ratedFill: "#ffd700"
                })
            });
            $("#rateYo_set_comment_star").rateYo({
                rating: parseFloat($("#rateYo_set_comment_star").attr("number_of_star")),
                starWidth: "50px",
                ratedFill: "#ffd700",
                fullStar: true,
                onSet: function (rating, rateYoInstance) {
                    $.ajax({
                        url: "product.html",
                        context: document.body
                    }).done(function (data) {

                        $('#comment_star').modal('hide');
                    });
                }
            });
            $("#rateYo_product").rateYo({
                rating: parseFloat($("#rateYo_product").attr("number_of_star")),
                readOnly: true,
                starWidth: "30px",
                ratedFill: "#ffd700"
            });
        });
        function remove_salers_main_box_mobile() {
            if (parseFloat(jQuery("html").width()) < 900) {
                jQuery(".salers_main_box_mobile").toggle(200);
            }
        }
        jQuery(function () {
            $("#add_star_btn").click(function (e) {
                e.preventDefault();
                $('#comment_star').modal({show: true})

            });

            $(".disable_form").click(function (e) {
                e.preventDefault();
                $('#mod_login_war').modal({show: true})
            });

            jQuery("#sp_productt_b").removeClass("parent_m_btn_active");
            jQuery("#info_productt_b").addClass("parent_m_btn_active");
            jQuery("#comment_productt_b").removeClass("parent_m_btn_active");

            jQuery("#info_productt").show(400);
            jQuery("#comment_productt").hide(400);
            jQuery("#sp_productt").hide(400);

            jQuery("#sp_productt_b").click(function (e) {
                jQuery("#sp_productt_b").addClass("parent_m_btn_active");
                jQuery("#info_productt_b").removeClass("parent_m_btn_active");
                jQuery("#comment_productt_b").removeClass("parent_m_btn_active");

                jQuery("#info_productt").hide(400);
                jQuery("#comment_productt").hide(400);
                jQuery("#sp_productt").show(400);
            });

            jQuery("#info_productt_b").click(function (e) {
                jQuery("#sp_productt_b").removeClass("parent_m_btn_active");
                jQuery("#info_productt_b").addClass("parent_m_btn_active");
                jQuery("#comment_productt_b").removeClass("parent_m_btn_active");
                jQuery("#info_productt").show(400);
                jQuery("#comment_productt").hide(400);
                jQuery("#sp_productt").hide(400);
            });

            jQuery("#comment_productt_b").click(function (e) {
                jQuery("#sp_productt_b").removeClass("parent_m_btn_active");
                jQuery("#info_productt_b").removeClass("parent_m_btn_active");
                jQuery("#comment_productt_b").addClass("parent_m_btn_active");
                jQuery("#info_productt").hide(400);
                jQuery("#comment_productt").show(400);
                jQuery("#sp_productt").hide(400);
            });
        });

        jQuery(function () {
            jQuery("#add_from").addClass("colm_edit");
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="comment_star" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="text-align: center" class="modal-body">
                    <div data-rateyo-rating="1" style="display: inline-block" id="rateYo_set_comment_star">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mod_login_war" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h3 style="
            text-align: center;
            padding-top:  17px;
            font-weight: normal;
            font-size: 16px;
        ">برای ثبت دیدگاه لطفا وارد اکانت خود شوید</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">تایید</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row product_main_box">
            @include('front.product.images')

            @include('front.product.summary')

            @include('front.product.price')
        </div>

        @if (! $sellers->isEmpty())
            @include('front.product.sellers')
        @endif

        <div class="row btn_show_info_product">

            <div class="col-lg-2 col-md-3 col-xs-4 parent_m_btn parent_m_btn_active" id="info_productt_b">
                <i class="fa fa-info" aria-hidden="true"></i>
                <a class="m_btn"> توضیحات </a>
            </div>

            @if($product_details)
            <div class="col-lg-2 col-md-3 col-xs-4 parent_m_btn" id="sp_productt_b">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <a class="m_btn">مشخصات</a>
            </div>
            @endif

            <div class="col-lg-2 col-md-3 col-xs-4 parent_m_btn" id="comment_productt_b">
                <i class="fa fa-comments-o" aria-hidden="true"></i>
                <a class="m_btn ">نظرات</a>
            </div>

        </div>

        @include('front.product.description')

        @include('front.product.comments')

        @if($product_details)
            @include('front.product.specs')
        @endif

        @include('front.component.related', ['product_list' => $related_products, 'component_title' => 'محصولات مرتبط'])

    </div>
@endsection