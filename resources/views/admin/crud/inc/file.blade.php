<div action="{{route($route . '.index')}}" class="dropzone" id="{{$name}}"></div>
<script>
    $(document).ready(function () {

        var {{$name}}Dropzone = new Dropzone('.dropzone', {
            addRemoveLinks: true,
            // autoProcessQueue: false,
            parallelUploads: 10,
            acceptedFiles: '.jpg, .png',
            removedfile: function (file) {
                // file.previewElement.remove();
                // axios.get('index.php?remove=' + file.upload.filename);
            },
            renameFile: function (file) {
                var mimes = {
                    'image/jpeg': '.jpg',
                    'image/png': '.png'
                };
                return Date.now() + mimes[file.type];
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
                'thumb' => $lib->getFullUrl('small')
            ])
        @endforeach
        //Add existing files into dropzone
        var existingFiles = {!! $dropzone_data !!};

        for (i = 0; i < existingFiles.length; i++) {
            console.log(existingFiles[i]);
            {{$name}}Dropzone.emit("addedfile", existingFiles[i]);
            {{$name}}Dropzone.emit("thumbnail", existingFiles[i], existingFiles[i].thumb);
            {{$name}}Dropzone.emit("complete", existingFiles[i]);
        }
        @endif
    });
</script>
