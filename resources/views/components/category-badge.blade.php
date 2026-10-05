@props(['category'])

@if ($category)
    <span {{ $attributes->class($category->badgeClass().' font-mono font-semibold') }}> {{ $category->code }} </span>
@endif
