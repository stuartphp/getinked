@props(['field'])
<th class="py-3 px-6 text-left">
    <a href="#" wire:click="sortBy('{{ $field }}')" class=" underline hover:text-indigo-500">
        <div class="flex items-center">
            {{ $slot }}
        </div>
    </a>
</th>
