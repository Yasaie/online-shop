<div class="f-box">

        <span class="filter_title">
            <i class="fa fa-align-right" aria-hidden="true"></i>
            دسته‌بندی نتایج
        </span>

    @if($current_category)
        <ul class="ul">
            @foreach($current_category->tree as $tree)
                <div>
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <a href="{{route('category', $tree->id)}}">{{$tree->title}}</a>
                </div>
            @endforeach
            @foreach($current_category->children as $child)
                <li><a href="{{route('category', $child->id)}}">{{$child->title}}</a></li>
            @endforeach
        </ul>
    @endif

</div>

<div class="f-box">

    <span class="filter_title">
            <i class="fa fa-search" aria-hidden="true"></i>
            جستجو در نتایج
    </span>

    <form class="filter_search">
        <i class="fa fa-search icon" aria-hidden="true"></i>
        <input placeholder="نام محصول مورد نظر را بنویسید" class="search_input">
    </form>

</div>

<div class="f-box">

    <form class="filter_switch">

        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>

        <label class="title_">فقط کالاهای موجود</label>
    </form>


</div>


@foreach($filters as $filter)
    <div class="f-box filter_value">

        <span class="filter_title">
                <i class="fa fa-hashtag" aria-hidden="true"></i>
                {{$filter->title}}
        </span>

        <ul>
            @foreach($filter->detailValues as $value)
                <label class="custom_ch">
                    <input type="checkbox">
                    <span class="checkmark"></span> {{$value->title}}
                </label>
            @endforeach
        </ul>

    </div>
@endforeach
