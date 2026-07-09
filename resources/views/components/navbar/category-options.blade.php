@props(['categories'])

<option value="" @selected(!request()->query('category'))>{{ __('ui.allCategories') }}</option>
@foreach ($categories as $category)
    <option value="{{ $category->id }}" @selected(request()->query('category') == $category->id)>{{ __("ui.{$category->name}") }}</option>
@endforeach
