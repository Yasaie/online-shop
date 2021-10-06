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
                    <p style="margin: 0">
                        کپی رایت - تمامی حقوق  {{setting('site.title')}} برای شرکت تورکان ایپک یولو محفوظ است. توسعه داده شده شده توسط : شرکت مهندسی شبکه
                        و فناوری اطلاعات تحلیلگران!
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>