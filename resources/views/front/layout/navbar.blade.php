<ul>
@foreach($categories as $category)
    <li>
        <a href="/category/{{$category->id}}">{{$category->locale('title')}}</a>
        @if(isset($category->children))
            @include('front.layout.navbar', ['categories' => $category->children])
        @endif
    </li>
@endforeach
</ul>