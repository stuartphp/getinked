@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'block font-medium text-sm text-gray-700',
    ])->merge([
        //
    ]);
@endphp

@if($label || !$slot->isEmpty())
    <label {{ $attributes }}>
        {{ $label ?? $slot }}
    </label>
@endif
