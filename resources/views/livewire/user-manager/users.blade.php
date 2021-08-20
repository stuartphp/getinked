<div class="py-2 px-2">

    <div class="bg-white rounded-lg shadow-md p-5">
        <x-crud-header>
        <x-slot name="title"><a href="{{ route('users-management.users') }}">{{ __('Users') }}</a></x-slot>
    </x-crud-header>
        <x-table>
            <x-slot name="header">
                <x-th-sort field="name">
                    <div>Name</div>
                    <x-icons.sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                </x-th-sort>
                <x-th-sort field="email">
                    <div>Email</div>
                    <x-icons.sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                </x-th-sort>
                <x-th>Is Active</x-th>
                <x-th>Verified</x-th>
                <x-th>Role</x-th>
                <x-th></x-th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $item->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->email }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ ($item->is_active==0) ? 'No' : 'Yes' }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $item->email_verified_at }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            @foreach ($item->roles as $role )
                            <span
                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $role->title }}</span>
                            @endforeach
                        </td>
                        <td class="py-3 px-6">
                            <div class="flex items-end justify-end">
                                <x-action-dropdown id="{{ $item->id }}">
                                    <x-action-link id="{{ $item->id}}" link="edit"/>
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
            @include('user-manager.users_form')
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemEdition', false)">Cancel</x-secondary-button>
            <x-button mode="add" wire:click="saveItem()">Save</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
