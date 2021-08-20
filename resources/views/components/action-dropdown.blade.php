@props(['id'])
<div x-data="{ open{{ $id }}: false }" class="relative">
    <button x-on:click="open{{ $id }} = true" class="block overflow-hidden focus:outline-none">
        <x-icons.lightning class="w-5 h-5"/>
    </button>
    <!-- Dropdown Body -->
    <div x-show.transition="open{{ $id }}"
        x-on:click.away="open{{ $id }} = false"
        class="absolute right-6 top-0 w-32 mt-2 py-2 bg-white border rounded shadow-xl z-10">
        {{ $slot }}
    </div>
    <!-- // Dropdown Body -->
</div>
