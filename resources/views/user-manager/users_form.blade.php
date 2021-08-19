<div class="grid grid-cols-2 gap-2">
    <div>
        <x-label>Name</x-label>
        <x-input type="text" wire:model.defer="item.name" />
        <x-error key="item.name"/>
    </div>
    <div>
        <x-label>Email</x-label>
        <x-input type="text" wire:model.defer="item.email" />
        <x-error key="item.email"/>
    </div>
    <div>
        <label for="is_active" class="flex items-center">
            <x-checkbox id="is_active" wire:model.defer="item.is_active" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Is Active') }}</span>
        </label>
    </div>
</div>

