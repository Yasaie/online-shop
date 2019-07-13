@if($pages->count > 1)
<nav>
    <ul class="pagination justify-content-center">
        @for($i = 1; $i <= $pages->count; $i++)
            @php
            $navigate = $query;
            $navigate['page'] = $i;
            @endphp
        <li class="page-item {{$pages->current == $i ? 'disabled' : ''}}">
            <a class="page-link" href="?{{http_build_query($navigate)}}">{{$i}}</a>
        </li>
        @endfor
    </ul>
</nav>
@endif