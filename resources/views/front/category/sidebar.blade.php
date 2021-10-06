<div class="f-box" xmlns:v-on="http://www.w3.org/1999/xhtml">

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

    <form class="filter_search" v-on:submit.prevent="getProducts()">
        <i class="fa fa-search icon" aria-hidden="true"></i>
        <input placeholder="نام محصول مورد نظر را بنویسید" class="search_input" v-model="search">
    </form>

</div>

<div class="f-box">

    <form class="filter_switch">

        <label class="switch">
            <input type="checkbox" v-model="for_sale">
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

    <ul class="filter_checkbox">
        @foreach($filter->detailByCategory($id) as $value)
            <label class="custom_ch">
                <input type="checkbox" @change="setFilter()" data-id="{{ $value->id }}"
                       @if(collect(request()->filters)->flatten()->contains($value->id)) checked @endif >
                <span class="checkmark"></span> {{$value->title}}
            </label>
        @endforeach
    </ul>

</div>
@endforeach
