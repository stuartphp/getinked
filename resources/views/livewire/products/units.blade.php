<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <x-crud-header>
            <x-slot name="title"><a href="{{ route('products.units') }}">{{ __('Units') }}</a></x-slot>
        </x-crud-header>
        <x-table maxWidth="md">
            <x-slot name="header">
                <x-th-sort field="name">
                    <div>Name</div>
                    <x-icons.sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                </x-th-sort>
                <x-th></x-th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data as $item)
                <x-tr>
                    <x-td>{{ $item->name }}</x-td>
                    <x-td>
                        <div class="flex items-end justify-end">
                            <x-action-dropdown>
                                <x-action-link id="{{ $item->id}}" link="edit"/>
                                <x-action-link id="{{ $item->id}}" link="delete"/>
                            </x-action-dropdown>
                        </div>
                    </x-td>
                </x-tr>
                @endforeach
            </x-slot>
            <x-slot name="footer">
                {{ $data->links() }}
            </x-slot>
        </x-table>

    </div>
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

    <x-dialog-modal wire:model="confirmingItemEdition" maxWidth="xl">
        <x-slot name="title">
            {{ $formTitle }}
        </x-slot>
        <x-slot name="content">
            @include('products.units_form')
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemEdition', false)">Cancel</x-secondary-button>
            <x-button mode="add" wire:click="saveItem()">Save</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
