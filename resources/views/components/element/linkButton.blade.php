@props([
    'href' => '',
    'theme' => 'primary',
])
@php
if (!function_exists('getThemeClassForButton')) {
    function getThemeClassForButton($theme)
    {
        return match ($theme) {
            'primary' => 'text-white
         bg-blue-500 hover:bg-blue-600 focus:ring-blue-500',
            'secondary' => 'text-white bg-red-500 hover:bg-red-600 focus:ring-red-500',
            default => ''
        };
    }
}
@endphp
<a href="{{ $href }}"
    class="{{ getThemeClassForButton($theme) }} inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">
    {{ $slot }}
</a>
