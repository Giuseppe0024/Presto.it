@props(['categories'])

<option value="" @selected(!old('category'))>Tutte le categorie</option>
@foreach ($categories as $category)
    <option value="{{ $category->id }}" @selected(old('category') == $category->id)>{{ $category->name }}</option>
@endforeach
