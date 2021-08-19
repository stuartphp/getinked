<div class="grid grid-cols-2 gap-4">
    <div class="mt-4">
        <x-label class="mb-1">Category</x-label>
        <select wire:model.defer="item.product_category_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block text-sm w-full">
            <option value="">Select</option>
            @foreach ($catagories as $cat)
                @if ($cat->parent_id==0)
                    <option value="{{ $cat->id }}" class="optionGroup">{{ $cat->name }}</option>
                    @foreach ($catagories as $sub )
                        @if ($sub->parent_id == $cat->id)
                            <option value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;{{ $sub->name }}</option>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </select>
    </div>
    <div class="mt-4">
        <x-label>Code</x-label>
        <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.code" />
        <x-error key="item.code"/>
    </div>
    <div class="mt-4">
        <x-label>Name</x-label>
        <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.name" />
        <x-error key="item.name"/>
    </div>

    <div class="mt-4">
        <x-label>Slug</x-label>
        <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.slug" />
        <x-error key="item.slug"/>
    </div>
</div>
<div class="mt-4">
    <x-label>Short Description</x-label>
    <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.short_description" />
    <x-error key="item.short_description"/>
</div>
<div class="mt-4">
    <x-label>Keywords</x-label>
    <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.keywords" />
    <x-error key="item.keywords"/>
</div>
<div class="mt-4">
    <x-label>Description</x-label>
    <x-textarea id="description" wire:model.defer="item.description"/>
</div>
<div class="grid grid-cols-2 gap-4">
    <div class="mt-4">
        <x-label>On Hand</x-label>
        <x-input class="block mt-1 w-full" type="number" wire:model.defer="item.on_hand" />
        <x-error key="item.on_hand"/>
    </div>
    <div class="mt-4">
        <x-label>Cost Price</x-label>
        <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.cost_price" />
        <x-error key="item.cost_price"/>
    </div>
</div>
<div class="grid grid-cols-3 gap-4">
    <div class="mt-4">
        <label for="is_feature" class="flex items-center">
            <x-checkbox id="is_feature" wire:model.defer="item.is_feature" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Is Feature') }}</span>
        </label>
    </div>
    <div class="mt-4">
        <label for="is_service" class="flex items-center">
            <x-checkbox id="is_service" wire:model.defer="item.is_service" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Is Service') }}</span>
        </label>
    </div>
    <div class="mt-4">
        <label for="is_active" class="flex items-center">
            <x-checkbox id="is_active" wire:model.defer="item.is_active" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Is Active') }}</span>
        </label>
    </div>
</div>
