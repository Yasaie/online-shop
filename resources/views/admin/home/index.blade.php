@extends('admin.layout')

@section('title', 'داشبورد')

@section('body')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">داشبورد</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">داشبورد ورژن 2</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>سفارشات جدید</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>افزایش امتیاز</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>کاربران ثبت شده</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>بازدید جدید</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <section class="col-lg-7 connectedSortable">

                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">
                                    <i class="fa fa-pie-chart mr-1"></i>
                                    فروش
                                </h3>
                                <ul class="nav nav-pills mr-auto p-2">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart"
                                           data-toggle="tab">نمودار</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">چارت</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0">

                                    <div class="chart tab-pane active" id="revenue-chart"
                                         style="position: relative; height: 300px;"></div>
                                    <div class="chart tab-pane" id="sales-chart"
                                         style="position: relative; height: 300px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">گفتگو</h3>

                                <div class="card-tools">
                                        <span data-toggle="tooltip" title="3 پیام جدید"
                                              class="badge badge-primary">3</span>
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="مخاصبین"
                                            data-widget="chat-pane-toggle">
                                        <i class="fa fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i
                                                class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="direct-chat-messages">

                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-left">حسام موسوی</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="assets/admin/img/user1-128x128.jpg"
                                             alt="message user image">

                                        <div class="direct-chat-text">
                                            واقعا این قالب رایگانه ؟ قابل باور نیست
                                        </div>

                                    </div>


                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-right">سارا</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="assets/admin/img/user3-128x128.jpg"
                                             alt="message user image">

                                        <div class="direct-chat-text">
                                            بهتره اینو باور کنی :)
                                        </div>

                                    </div>


                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-left">حسام موسوی</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="assets/admin/img/user1-128x128.jpg"
                                             alt="message user image">

                                        <div class="direct-chat-text">
                                            میخوام با این قالب یه اپلیکیشن باحال بزنم ؟‌ تو هم همکاری میکنی ؟
                                        </div>

                                    </div>


                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-right">سارا</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="assets/admin/img/user3-128x128.jpg"
                                             alt="message user image">

                                        <div class="direct-chat-text">
                                            اره حتما
                                        </div>

                                    </div>


                                </div>


                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="assets/admin/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            حسام موسوی
                            <small class="contacts-list-date float-left">1397/10/01</small>
                          </span>
                                                    <span class="contacts-list-msg">تا حالا کجا بودی ؟‌من...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="assets/admin/img/user7-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            سارا فرهانی
                            <small class="contacts-list-date float-left">2/23/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">تا حالا منتظر تو بودم...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="assets/admin/img/user3-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            نکیسا کیانی
                            <small class="contacts-list-date float-left">2/20/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">پس بیشتر صبر کن تا برگردم...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="assets/admin/img/user5-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            رحمت موسوی
                            <small class="contacts-list-date float-left">2/10/2015</small>
                          </span>
                                                    <span class="contacts-list-msg"> حالتون چطورههههه !...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="assets/admin/img/user6-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            جکسون عبداللهی
                            <small class="contacts-list-date float-left">1/27/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">عالیییییییییی...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="assets/admin/img/user8-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            کتایون ریحانی
                            <small class="contacts-list-date float-left">1/4/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">بیخیالش پیداش میکنم...</span>
                                                </div>

                                            </a>
                                        </li>

                                    </ul>

                                </div>

                            </div>

                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..."
                                               class="form-control">
                                        <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    لیست کارها
                                </h3>

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body">
                                <ul class="todo-list">
                                    <li>
                                        
                                        <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>

                                        <input type="checkbox" value="" name="">

                                        <span class="text">طراحی یک قالب زیبا</span>

                                        <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 دقیقه
                                        </small>

                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">رسپانسیو کردن قالب مورد نظر</span>
                                        <small class="badge badge-info"><i class="fa fa-clock-o"></i> 4 ساعت</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">ارائه قالب برای استفاده بقیه</span>
                                        <small class="badge badge-warning"><i class="fa fa-clock-o"></i> 1 روز
                                        </small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">بهینه سازی بخش های بوجود اومده</span>
                                        <small class="badge badge-success"><i class="fa fa-clock-o"></i> 3 روز
                                        </small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">چک کردن پیام ها و نوتیفیکیشن ها</span>
                                        <small class="badge badge-primary"><i class="fa fa-clock-o"></i> 1 هفته
                                        </small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">طراحی صفحه ایمیل جدید</span>
                                        <small class="badge badge-secondary"><i class="fa fa-clock-o"></i> 1 ماه
                                        </small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i>
                                    جدید
                                </button>
                            </div>
                        </div>

                    </section>

                    <section class="col-lg-5 connectedSortable">

                        <div class="card bg-primary-gradient">
                            <div class="card-header no-border">
                                <h3 class="card-title">
                                    <i class="fa fa-map-marker mr-1"></i>
                                    بازدید‌ها
                                </h3>

                                <div class="card-tools">
                                    <button type="button"
                                            class="btn btn-primary btn-sm daterange"
                                            data-toggle="tooltip"
                                            title="Date range">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                    <button type="button"
                                            class="btn btn-primary btn-sm"
                                            data-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>

                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">بازدید‌ها</div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">آنلاین</div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">فروش</div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card bg-info-gradient">
                            <div class="card-header no-border">
                                <h3 class="card-title">
                                    <i class="fa fa-th mr-1"></i>
                                    نمودار فروش
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" id="line-chart" style="height: 250px;"></div>
                            </div>

                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="20"
                                               data-width="60" data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">سفارش ایمیلی</div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="50"
                                               data-width="60" data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">سفارش آنلاین</div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30"
                                               data-width="60" data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">سفارش فیزیکی</div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card bg-success-gradient">
                            <div class="card-header no-border">

                                <h3 class="card-title">
                                    <i class="fa fa-calendar"></i>
                                    تقویم
                                </h3>

                                <div class="card-tools">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fa fa-bars"></i></button>
                                        <div class="dropdown-menu float-right" role="menu">
                                            <a href="#" class="dropdown-item">رویداد تازه</a>
                                            <a href="#" class="dropdown-item">حذف رویدادها</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">نمایش تقویم</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body p-0">

                                <div id="calendar" style="width: 100%"></div>
                            </div>

                        </div>

                    </section>

                </div>

            </div>
        </section>

    </div>
@endsection