@props(['field', 'title', 'sortBy'=>'', 'sortAsc'=>''])
<th class="py-3 px-6 text-left">
    <a href="#" wire:click="sortBy('{{ $field }}')">
        <div class="flex items-center">
            <div>{{ $title }}</div>
            <x-icons.sort sortField="{{ $field }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        </div>
    </a>
</th>
