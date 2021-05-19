@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-ma-light-gray focus:ring-indigo-500 focus:border-indigo-500']) !!}>
