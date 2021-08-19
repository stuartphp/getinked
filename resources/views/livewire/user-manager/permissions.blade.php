<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <x-crud-header>
            <x-slot name="title"><a href="{{ route('users-management.permissions') }}">{{ __('Permissions') }}</a></x-slot>
        </x-crud-header>
        <x-table>
            <x-slot name="header">
                <x-th>
                    <a href="#" wire:click="sortBy('title')">
                        <div class="flex items-center">
                            <div>Title</div>
                            <x-icons.sort sortField="title" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                        </div>
                    </a>
                </x-th>
                <x-th class="text-right">Actions</x-th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        {{ $item->title }}
                    </td>
                    <td class="py-3 px-6">
                        <div class="flex item-end justify-end">
                            <x-edit-button component='user-manager.permissions-child' id="{{ $item->id }}" />
                            <x-delete-button component='user-manager.permissions-child' id="{{ $item->id }}" />
                        </div>
                    </td>
                </tr>
            @endforeach
            </x-slot>
        </x-table>
    {{ $data->links() }}
    </div>
    <x-confirmation-modal maxWidth="sm" wire:model="confirmingItemDeletion">
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

    <x-dialog-modal maxWidth="sm" wire:model="confirmingItemEdition">
        <x-slot name="title">
            Edit Record
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-label>Title</x-label>
                <x-input class="block mt-1 w-full" type="text" wire:model.defer="item.title" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemEdition', false)">Cancel</x-secondary-button>
            <x-button mode="add" wire:click="saveItem()">Save</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
