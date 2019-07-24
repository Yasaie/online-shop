<select name="{{$name}}[]" id="{{$name}}" multiple class="form-control select2"
        style="width: 100%"
        data-placeholder="">
    @foreach($content['all'] as $c)
        @php($id = isset($content['id']) ? Y::dotObject($c, $content['id']) : $c->id)
    <option value="{{$id}}"
        {{ (isset($value) and in_array($id, $value)) ? 'selected' : '' }}>
        {{ Y::dotObject($c, $content['name']) }}
    </option>
    @endforeach
</select>