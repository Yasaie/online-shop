@if($pages->count > 1)
    <nav>
        <ul class="pagination justify-content-center">
            @php
                $navigate = $query;
                $navigate['page'] = $pages->current - 1;
            @endphp
            <li class="page-item {{$pages->current == 1 ? 'disabled' : ''}}">
                <a class="page-link" href="?{{http_build_query($navigate)}}"><i class="fa fa-chevron-right"></i></a>
            </li>
            @if($pages->current > 2)
                @php
                    $navigate = $query;
                    $navigate['page'] = 1;
                @endphp
                <li class="page-item">
                    <a class="page-link" href="?{{http_build_query($navigate)}}">1</a>
                </li>
                @if($pages->current > 3)
                    <li class="page-item disabled"><a href="" class="page-link">...</a></li>
                @endif
            @endif
            @php
                $start = $pages->current < $pages->count
                    ? ($pages->current > 1 ? $pages->current - 1 : 1)
                    : $pages->current - 2;
                $end = $pages->current < $pages->count
                    ? $pages->current + ($pages->current > 1 ? 1 : 2)
                    : $pages->count;
            @endphp
            @for($i = $start; $i <= $end; $i++)
                @php
                    $navigate = $query;
                    $navigate['page'] = $i;
                @endphp
                <li class="page-item {{$pages->current == $i ? 'disabled' : ''}}">
                    <a class="page-link" href="?{{http_build_query($navigate)}}">{{$i}}</a>
                </li>
            @endfor
            @if($pages->current < $pages->count - 1)
                @if($pages->current < $pages->count - 2)
                    <li class="page-item disabled"><a href="" class="page-link">...</a></li>
                @endif
                @php
                    $navigate = $query;
                    $navigate['page'] = $pages->count;
                @endphp
                <li class="page-item">
                    <a class="page-link" href="?{{http_build_query($navigate)}}">{{$pages->count}}</a>
                </li>
            @endif
            @php
                $navigate = $query;
                $navigate['page'] = $pages->current + 1;
            @endphp
            <li class="page-item {{$pages->current == $pages->count ? 'disabled' : ''}}">
                <a class="page-link" href="?{{http_build_query($navigate)}}"><i class="fa fa-chevron-left"></i></a>
            </li>
        </ul>
    </nav>
@endif