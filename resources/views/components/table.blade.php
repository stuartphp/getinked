@props(['maxWidth'=>'max'])

@php
$maxWidth = [
    'sm' => 'w-1/4',
    'md' => 'w-1/2',
    'lg' => 'w-3/4',
    'max' => 'w-full',
][$maxWidth ?? 'w-full'];
@endphp
<table {!! $attributes->merge(['class' => 'table mt-3 m-auto '.$maxWidth]) !!}>
    <thead>
        <tr class=" text-gray-800 uppercase text-sm border-b">
        {{ $header }}
        </tr>
    </thead>
    <tbody>
        {{ $body }}
    </tbody>
    <tfoot>
        <tr>
            <td colspan="20">{{ $footer }}</td>
        </tr>

    </tfoot>
</table>
