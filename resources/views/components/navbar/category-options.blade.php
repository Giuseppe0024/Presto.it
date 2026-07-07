@props(['categories'])

<option value="" @selected(!old('category'))>{{ __('ui.allCategories') }}</option>
@foreach ($categories as $category)
    <option value="{{ $category->id }}" @selected(old('category') == $category->id)>{{ __("ui.{$category->name}") }}</option>
@endforeach
