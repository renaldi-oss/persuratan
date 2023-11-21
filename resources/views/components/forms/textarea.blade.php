@push('styles')
    <link rel="stylesheet" href="{{ asset('./plugins/summernote/summernote-bs4.css') }}">
@endpush

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <textarea type="text" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}">
        {!! old($name, ($value ?? '')) !!}
    </textarea>
    <x-errormessage :error="$name" />
</div>

@push('script')
    <script src="{{ asset('./plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#{{ $id }}').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endpush
