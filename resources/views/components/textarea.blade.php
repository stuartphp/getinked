@props(['id'=>null])

<textarea {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!} rows="4" id="{{ $id }}"></textarea>
