<!DOCTYPE html>
<html>

<head>
    <title>Laravel Dropzone Form</title>
    <link href="../../../vendors/dropzone/dropzone.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="{{ url('/form-submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="dropzone" id="image-upload"></div>
        <button type="submit">Submit</button>
    </form>
    @endif

    <script src="../../../vendors/dropzone/dropzone-min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#image-upload", {
            url: "{{ url('/form-submit') }}",
            autoProcessQueue: true,
            paramName: "image",
            maxFiles: 5,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
    </script>
</body>

</html>
