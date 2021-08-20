@props(['id', 'link', 'route'=>null])

@php
    $val = [
        'copy' => ['copyItemForm', 'Copy'],
        'edit' => ['showEditForm', 'Edit'],
        'delete' => ['showDeleteForm', 'Delete'],
        'images' => ['showImagesForm', 'Images']
    ];
@endphp
@if ($route)
<a href="{{ $route }}" class="transition-colors duration-200 block px-4 py-1 text-sm text-gray-900 rounded hover:bg-purple-500 hover:text-white">{{ $val[$link][1] }}</a>
@else
<a href="#" class="transition-colors duration-200 block px-4 py-1 text-sm text-gray-900 rounded hover:bg-purple-500 hover:text-white" wire:click="{{ $val[$link][0] }}({{$id}})">{{ $val[$link][1] }}</a>
@endif


