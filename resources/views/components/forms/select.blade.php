<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select class="form-control select2 @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, ($value ?? '')) }}">
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}">{{ $option['nama'] }}</option>
        @endforeach
    </select>
</div>
