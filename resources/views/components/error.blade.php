@props([
    'key' => null,
])

@php
    $attributes = $attributes->class([
        'text-red-400 text-xs mt-1',
    ])->merge([
        //
    ]);
@endphp

@error($key)
    <div {{ $attributes }}>
        {{ $message }}
    </div>
@enderror
