<select name="{{$name}}" id="{{$name}}" class="form-control select2"
        style="width: 100%"
        data-placeholder="">
    <option></option>
    @foreach($option['all'] as $c)
        @php($id = isset($option['id'])
            ? Y::dotObject($c, $option['id'])
            : Y::dotObject($c, 'id')
        )
        @php($title = isset($option['name'])
            ? Y::dotObject($c, $option['name'])
            : Y::dotObject($c, 'title')
        )
    <option value="{{$id}}"
        {{ (isset($value) and $value == $id) ? 'selected' : '' }}>
        {{ $title }}
    </option>
    @endforeach
</select>