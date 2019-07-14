<select name="{{$name}}" id="{{$name}}" class="form-control select2" style="width: 100%">
    @foreach($content['all'] as $c)
    <option value="{{$c->id}}" {{(isset($value) and $value == $c->id) ? 'selected' : ''}}>{{$c->{$content['name']} }}</option>
    @endforeach
</select>