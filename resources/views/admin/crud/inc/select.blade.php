<select name="{{$name}}" id="{{$name}}" class="form-control select2"
        style="width: 100%"
        data-placeholder="">
    <option></option>
    @foreach($content['all'] as $c)
        @php($id = isset($content['id'])
            ? Y::dotObject($c, $content['id'])
            : Y::dotObject($c, 'id')
        )
        @php($title = isset($content['name'])
            ? Y::dotObject($c, $content['name'])
            : Y::dotObject($c, 'title')
        )
    <option value="{{$id}}"
        {{ (isset($value) and $value == $id) ? 'selected' : '' }}>
        {{ $title }}
    </option>
    @endforeach
</select>