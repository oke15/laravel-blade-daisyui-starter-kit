@props(['href' => '#', 'route' => null, 'active' => false, 'tooltip' => null])

@php
    $isActive = $active || ($route && request()->routeIs($route));
@endphp

<a href="{{ $href }}" {{ $attributes->class(['menu-active' => $isActive]) }}>
    <button class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="{{ $tooltip }}">
        {{ $icon }}
        <span class="is-drawer-close:hidden">{{ $slot }}</span>
    </button>
</a>
