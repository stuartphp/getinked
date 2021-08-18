@props([
    'label' => null,
    'placeholder' => null,
    'options' => [],
    'icon' => null,
    'prepend' => null,
    'append' => null,
    'help' => null,
    'model' => null,
    'lazy' => false,
])

@php
    if ($lazy) $bind = '.lazy';
    else $bind = '.defer';

    $options = Arr::isAssoc($options) ? $options : array_combine($options, $options);

    $attributes = $attributes->class([
        'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block text-sm w-full',
    ])->merge([
        'id' => $model,
        'wire:model' . $bind => 'model.' . $model,
    ]);
@endphp

<div>
    <x-label :for="$model" :label="$label"/>

    <div class="input-group">
        <x-input-addon :icon="$icon" :label="$prepend"/>

        <select {{ $attributes }}>
            <option value="">{{ $placeholder }}</option>

            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
            @endforeach
        </select>

        <x-input-addon :label="$append" class="rounded-end"/>

        <x-error :key="$model"/>
    </div>

    <x-help :label="$help"/>
</div>
