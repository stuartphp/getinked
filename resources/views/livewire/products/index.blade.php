<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <x-crud-header>
            <x-slot name="title"><a href="{{ route('products.list') }}">{{ __('Products') }}</a></x-slot>
        </x-crud-header>
        <x-table>
            <x-slot name="header">
                <x-th-sort field="code">
                    <div>code</div>
                    <x-icons.sort sortField="code" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                </x-th>
                <x-th-sort field="name">
                    <div>Name</div>
                     <x-icons.sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                </x-th-sort>
                <x-th>Category</x-th>
                <x-th class="text-center">On Hand</x-th>
                <x-th class="text-center">Cost Price</x-th>
                <x-th class="text-center">Retail Price</x-th>
                <x-th></x-th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100 @if($item->is_active == 0) text-red-400 @endif">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        {{ $item->code }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{  $item->name }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $item->category->name }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $item->on_hand }}
                    </td>
                    <td class="py-3 px-6 text-right">
                        {{ number_format($item->cost_price/100, 2) }}
                    </td>
                    <td class="py-3 px-6 text-right">
                        {{ number_format($item->retail_price/100, 2) }}
                    </td>
                    <td class="py-3 px-6">
                        <div class="flex item-end justify-end">

                            <x-action-dropdown id="{{ $item->id }}">
                                <x-action-link id="{{ $item->id}}" link="copy"/>
                                <x-action-link id="{{ $item->id}}" link="edit"/>
                                <x-action-link id="{{ $item->id}}" link="images"/>
                                <x-action-link id="{{ $item->id}}" link="delete"/>
                            </x-action-dropdown>
                        </div>

                    </td>
                </tr>
            @endforeach
            </x-slot>
            <x-slot name="footer">
                {{ $data->links() }}
            </x-slot>
        </x-table>

    <x-confirmation-modal wire:model="confirmingItemDeletion">
        <x-slot name="title">Delete</x-slot>
        <x-slot name="content">Are you sure you want to delete this record?</x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-danger-button class="ml-2" mode="delete" wire:click="deleteItem()" wire:loading.attr="disabled">
                {{ __('Delete Record') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <x-dialog-modal wire:model="confirmingItemEdition" maxWidth="5xl">
        <x-slot name="title">
            {{ $formTitle }}
        </x-slot>
        <x-slot name="content">
            @include('products.list_form')
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemEdition', false)">Cancel</x-secondary-button>
            <x-button mode="add" wire:click="saveItem()">Save</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
