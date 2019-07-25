<div action="{{route('admin.media.upload', $option['temp'])}}" class="dropzone" id="{{$name}}"></div>
<script>
    $(document).ready(function () {

        var _token = "{{ csrf_token() }}";
        var {{$name}}Dropzone = new Dropzone('.dropzone', {
            addRemoveLinks: true,
            // autoProcessQueue: false,
            parallelUploads: 10,
            acceptedFiles: '.jpg, .png, .gif',
            sending: function(file, xhr, formData) {
                formData.append("_token", _token);
            },
            success: function (file, response) {
                file.id = response;
            },
            removedfile: function (file) {
                file.previewElement.remove();
                $.ajax({
                    type: 'delete',
                    url: '{{route('admin.media.unlink')}}/' + file.id,
                    data: {
                        _token: _token
                    }
                });
            },
            renameFile: function (file) {
                // var mimes = {
                //     'image/jpeg': '.jpg',
                //     'image/png': '.png',
                //     'image/gif': '.gif',
                //                     };
                // return Date.now() + mimes[file.type];
            }
        });

        @if(isset($value))
        @php($get = isset($get) ? $get : $name)
        @php($library = $value->getMedia($get))
        @php($dropzone_data = collect())
        @foreach($library as $lib)
        @php($dropzone_data[] = [
            'name' => $lib->getAttribute('file_name'),
            'size' => $lib->getAttribute('size'),
            'thumb' => $lib->getFullUrl('small'),
            'id' => $lib->id
        ])
        @endforeach
        //Add existing files into dropzone
        var existingFiles = {!! $dropzone_data !!};

        for (i = 0; i < existingFiles.length; i++) {
            {{$name}}Dropzone.emit("addedfile", existingFiles[i]);
            {{$name}}Dropzone.emit("thumbnail", existingFiles[i], existingFiles[i].thumb);
            {{$name}}Dropzone.emit("complete", existingFiles[i]);
        }
        @endif
    });
</script>
