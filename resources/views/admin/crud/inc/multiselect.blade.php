<select name="{{$name}}[]" id="{{$name}}" multiple class="form-control select2"
        style="width: 100%"
        data-placeholder="">
    @foreach($option['all'] as $c)
        @php($id = isset($option['id']) ? Y::dotObject($c, $option['id']) : $c->id)
    <option value="{{$id}}"
        {{ (isset($value) and in_array($id, $value)) ? 'selected' : '' }}>
        {{ Y::dotObject($c, $option['name']) }}
    </option>
    @endforeach
</select>