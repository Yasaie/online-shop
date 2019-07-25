<aside class="main-sidebar elevation-4 sidebar-dark-info">

    <a href="/admin" class="brand-link bg-info">
        <img src="{{asset('assets/admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin/img/user.png')}}"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.user.show', Auth::id() ?: 0)}}" class="d-block">{{Auth::user() ? Auth::user()->full_name : 'Guest'}}</a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @foreach($menu_items as $menu)
                <li class="nav-item {{isset($menu['child']) ? 'has-treeview' : ''}} {{Route::is($menu['base'] . '*') ? 'menu-open' : ''}}">
                    <a href="{{isset($menu['route']) ? route($menu['base'] . $menu['route']) : '#' }}" class="nav-link d-flex">
                        <i class="nav-icon fa fa-{{$menu['icon']}}"></i>
                        <p class="flex-grow-1">
                        @if(! isset($menu['route']))
                            <i class="right fa fa-angle-left"></i>
                        @endif
                            <span>{{$menu['name']}}</span>
                        </p>
                        @if(isset($menu['count']) and $menu['count'])
                        <span class="badge badge-danger" style="margin: 3px 15px;">{{$menu['count']}}</span>
                        @endif
                    </a>
                    @if(isset($menu['child']))
                    <ul class="nav nav-treeview">
                        @foreach($menu['child'] as $child)
                        <li class="nav-item">
                            <a href="{{url()->route($menu['base'] . $child['route'])}}" class="nav-link d-flex {{Route::is($menu['base'] . $child['route']) ? 'active' : ''}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p class="flex-grow-1">{{$child['name']}}</p>
                                @if(isset($child['count']) and $child['count'])
                                <span class="badge badge-info" style="margin: 3px 15px;">{{$child['count']}}</span>
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach

            </ul>
        </nav>

    </div>

</aside>
