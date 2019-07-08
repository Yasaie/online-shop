<ul>
@foreach($menus as $menu)
    <li>
        <a href="/category/{{$menu->category->id}}">{{$menu->category->title}}</a>
        @if(isset($menu->children))
            @include('front.layout.navbar', ['menus' => $menu->children])
        @endif
    </li>
@endforeach
</ul>