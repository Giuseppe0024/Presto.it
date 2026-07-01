@props(['name', 'label', 'type' => 'text', 'showError' => true])

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
    @if ($showError)
        <x-input-error :field="$name"/>
    @endif
</div>
