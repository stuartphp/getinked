<div class="grid grid-cols-2 gap-2">
    <div>
        <x-label>Parent</x-label>
        <select wire:model.defer="item.parent_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block text-sm w-full">
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
    <div>
        <x-label>Name</x-label>
        <x-input type="text" wire:model="item.name" />
        <x-error key="item.name"/>
    </div>
    <div class="mt-4">
        <x-label>Slug</x-label>
        <x-input type="text" wire:model.defer="item.slug" />
        <x-error key="item.slug"/>
    </div>
    <div class="mt-10">
        <label for="is_active" class="flex items-center">
            <x-checkbox id="is_active" wire:model.defer="item.is_active" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Is Active') }}</span>
        </label>
    </div>
</div>
