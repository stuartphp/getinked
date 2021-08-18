<div class="grid grid-cols-2 gap-1">
    <div>
        <x-label>Name</x-label>
        <x-jet-input type="text" wire:model.defer="item.name" />
        <x-error key="item.name"/>
    </div>
    <div>
        <x-label>Email</x-label>
        <x-jet-input type="text" wire:model.defer="item.email" />
        <x-error key="item.email"/>
    </div>
</div>

