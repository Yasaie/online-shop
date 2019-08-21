<div class="category_map">
    <a href="{{route('home')}}">{{setting('site.title')}}</a> /
    @foreach($current_category->tree as $tree)
        <a href="{{route('category', $tree->id)}}">{{$tree->title}}</a>
        @if(last($current_category->tree) != $tree)
            /
        @endif
    @endforeach
    <span class="sort_size">@{{Object.keys(products).length}} کالا</span>
</div>