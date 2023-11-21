@pushOnce('styles')
{{-- style select2 --}}
<link rel="stylesheet" href="{{ asset('./plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">    
@endPushOnce

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select class="form-control select2 @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}" {{ old($name, $value) == $option['id'] ? 'selected' : '' }}>{{ $option['nama'] }}</option>
        @endforeach
    </select>
</div>

@pushOnce('script')
{{-- script select2 --}}
<script src="{{ asset('./plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
</script>
@endPushOnce
