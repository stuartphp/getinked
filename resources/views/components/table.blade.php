<table {!! $attributes->merge(['class' => 'table w-full mt-3']) !!}>
    <thead>
        <tr class=" text-gray-800 uppercase text-sm border-b">
        {{ $header }}
        </tr>
    </thead>
    <tbody>
        {{ $body }}
    </tbody>
</table>
