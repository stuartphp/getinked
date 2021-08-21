<div x-data="{ actiondrop: false }" class="relative">
    <button x-on:click="actiondrop = true" class="block overflow-hidden focus:outline-none">
        <x-icons.lightning class="w-5 h-5"/>
    </button>
    <!-- Dropdown Body -->
    <div x-show.transition="actiondrop"
        x-on:click.away="actiondrop = false"
        class="absolute right-6 top-0 w-32 mt-2 py-2 bg-white border rounded shadow-xl z-10">
        {{ $slot }}
    </div>
    <!-- // Dropdown Body -->
</div>
