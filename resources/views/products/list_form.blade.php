<div class="grid grid-cols-3 gap-4">
    <div class="mt-4">
        <x-jet-label class="mb-1">Category</x-jet-label>
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
        <x-jet-label>Code</x-jet-label>
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.code" />
        <x-error key="item.code"/>
    </div>
    <div class="mt-4">
        <x-jet-label>Name</x-jet-label>
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.name" />
        <x-error key="item.name"/>
    </div>

    <div class="mt-4">
        <x-jet-label>Slug</x-jet-label>
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.slug" />
        <x-error key="item.slug"/>
    </div>
    <div class="mt-4">
        <x-jet-label>Short Description</x-jet-label>
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.short_description" />
    </div>
    <div class="mt-4">
        <x-jet-label>Keywords</x-jet-label>
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.keywords" />
    </div>
</div>
<div class="mt-4">
    <x-jet-label>Description</x-jet-label>
    <x-textarea id="{{ $des }}"/>
</div>
<div class="grid grid-cols-3 gap-4">
<div class="mt-4">
    <x-jet-label>On Hand</x-jet-label>
    <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.on_hand" />
</div>
<div class="mt-4">
    <x-jet-label>Cost Price</x-jet-label>
    <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.cost_price" />
</div>
<div class="mt-4">
    <x-jet-label>Is Service</x-jet-label>
    <select wire:model.defer="item.is_service" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block text-sm w-full">
        <option value="">Select</option>
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select>
</div>
<div class="mt-4">
    <x-jet-label>Is Active</x-jet-label>
    <select wire:model.defer="item.is_active" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block text-sm w-full">
        <option value="">Select</option>
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select>
</div>
</div>
