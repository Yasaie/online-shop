<footer id="footer" class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">

                @for($i = 1; $i <= 4; $i++)
                <div class="col-sm-6 col-md-3">
                    <aside class="widget widget_nav_menu">
                        <h3 class="widget-title">{{setting("footer.block{$i}.title")}}</h3>
                        <div style="text-align: justify">
                            {!! setting("footer.block{$i}.body") !!}
                        </div>
                    </aside>
                </div>
                @endfor

            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <p>کپی رایت - تمامی حقوق برای تورکان ایپک یولی محفوظ است. توسعه داده شده شده توسط : شرکت مهندسی شبکه
                        و فناوری اطلاعات تحلیلگران! </p>
                </div>
                <div hidden class="col-xs-12 col-sm-6 text-right">
                    <div class="payments-method">
                        <!-- <img src="asset/image/2017/11/897987.png" alt="Payments"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>