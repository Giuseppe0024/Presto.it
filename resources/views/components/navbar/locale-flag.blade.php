@props(['lang', 'flag' => null])

<form action="{{ route( 'setLocale', $lang ) }}" method="POST">
    @csrf
    <button type="submit" class="dropdown-item d-flex align-items-center gap-2">
        <img src="{{asset('vendor/blade-flags/country-'.($flag ?? $lang).'.svg')}}" width="24" height="17">
        <span>{{ trans('ui.localeLabel', [], $lang) }}</span>
    </button>
</form>
