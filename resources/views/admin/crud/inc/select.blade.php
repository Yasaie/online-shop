<select name="{{$name}}" id="{{$name}}" class="form-control select2"
        style="width: 100%"
        data-placeholder="">
    <option></option>
    @foreach($content['all'] as $c)
        @php($id = isset($content['id']) ? Y::dotObject($c, $content['id']) : $c->id)
    <option value="{{$id}}"
        {{ (isset($value) and $value == $id) ? 'selected' : '' }}>
        {{ Y::dotObject($c, $content['name']) }}
    </option>
    @endforeach
</select>