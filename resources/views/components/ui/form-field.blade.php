@props(['name', 'label', 'type' => 'text', 'showError' => true])

<div>
    <label for="{{ $name }}">{{ ucfirst($label) }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
    @if ($showError)
        <x-ui.input-error :field="$name"/>
    @endif
</div>

{{--bisogna aumentare i tipi di input (eg. textarea) e @class--}}