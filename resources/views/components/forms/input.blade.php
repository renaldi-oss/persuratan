@props([
        'type' => 'text',
        'id' => '',
        'label' => '',
        'name' => '',
        'placeholder' => '',
        'value' => '',
    ])

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, ($value ?? '')) }}">
    <x-errormessage :error="$name" />
</div>