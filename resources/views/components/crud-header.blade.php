@props(['title', 'link', 'search'=>'true', 'create'=>'true'])

<div class="grid grid-cols-3 mb-2">
    <div class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
    </div>
    <div>
    @if ($create == 'true')
    <a href="#" class="hover:text-indigo-500" wire:click="showCreateForm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    </a>
    @elseif ($create != 'false')
    <a href="{{ $create }}" class="hover:text-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    </a>
    @endif
    </div>
    <div class="flex justify-end">
        @if($search == 'true')
        <x-page-size class="w-20 h-9" />
        <x-input type="search" wire:model.debounce.300ms="searchTerm"
            class="ml-3 bg-purple-white shadow rounded border-0 h-9" placeholder="Search..." />
            @endif
    </div>
</div>

