@props(['name', 'label', 'type' => 'text', 'showError' => true])

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
    @if ($showError)
        @error($name) <span class="text-danger small">{{ $message }}</span>@enderror
    @endif
</div>
