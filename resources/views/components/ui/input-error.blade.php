@props(['field'])

@error($field)
    <p class="small text-danger">{{ $message }}</p>
@enderror
