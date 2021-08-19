<input
    x-data
    x-ref="input"
    x-init="new flatpickr($refs.input,{ dateFormat: 'Y-m-d' })"
    {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md text-sm shadow-sm h-9']) !!}
 />
