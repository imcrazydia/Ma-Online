@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-white focus:outline-none focus:text-white focus:bg-magenta-100 focus:border-magenta-100 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-white hover:border-magenta-100 focus:outline-none focus:text-white focus:bg-magenta-100 focus:border-magenta-100 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
