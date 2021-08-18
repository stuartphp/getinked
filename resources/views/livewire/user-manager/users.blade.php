<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <div class="grid grid-cols-3 mb-2">
            <div class="text-xl">{{ __('Users') }}</div>
            <div>
                <a href="#" class="hover:text-indigo-500" wire:click="showCreateForm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </a>
            </div>
            <div class="flex justify-end">
                <x-page-size class="w- h-9" />
                <x-input type="search" wire:model.debounce.300ms="searchTerm"
                    class="ml-3 bg-purple-white shadow rounded border-0 h-9" placeholder="Search..." />
            </div>
        </div>
        <x-table>
            <x-slot name="header">

                    <th class="py-3 px-6 text-left">
                        <a href="#" wire:click="sortBy('name')">
                            <div class="flex items-center">
                                <div>Name</div>
                                <x-icons.sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </a>
                    </th>
                    <th class="py-3 px-6 text-left">
                        <a href="#" wire:click="sortBy('email')">
                            <div class="flex items-center">
                                <div>Email</div>
                                <x-icons.sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </a>
                    </th>
                    <x-th>Verified</x-th>
                    <x-th>Role</x-th>
                    <x-th>Actions</x-th>

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
                            {{ $item->emai_verified_at }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            @foreach ($item->roles as $role )
                            <span
                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $role->title }}</span>
                            @endforeach
                        </td>
                        <td class="py-3 px-6 text-right">
                            <div class="flex items-end justify-end">
                                <x-edit-button id="{{ $item->id }}"/>
                                <x-delete-button id="{{ $item->id }}"/>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        {{-- <table class="table w-full mt-3">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">
                        <a href="#" wire:click="sortBy('name')">
                            <div class="flex items-center">
                                <div>Name</div>
                                <x-icons.sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </a>
                    </th>
                    <th class="py-3 px-6 text-left">
                        <a href="#" wire:click="sortBy('email')">
                            <div class="flex items-center">
                                <div>Email</div>
                                <x-icons.sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </a>
                    </th>
                    <th class="py-3 px-6 text-center">Verified</th>
                    <th class="py-3 px-6 text-center">Role</th>
                    <th class="py-3 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($data as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $item->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->email }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $item->emai_verified_at }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            @foreach ($item->roles as $role )
                            <span
                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $role->title }}</span>
                            @endforeach
                        </td>
                        <td class="py-3 px-6 text-right">
                            <div class="flex items-end justify-end">
                                <x-edit-button id="{{ $item->id }}"/>
                                <x-delete-button id="{{ $item->id }}"/>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        {{ $data->links() }}
    </div>

    <x-confirmation-modal wire:model="confirmingItemDeletion">
        <x-slot name="title">Delete</x-slot>
        <x-slot name="content">Are you sure you want to delete this record?</x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" mode="delete" wire:click="deleteItem()" wire:loading.attr="disabled">
                {{ __('Delete Record') }}
            </x-jet-danger-button>
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
            <x-jet-secondary-button wire:click="$set('confirmingItemEdition', false)">Cancel</x-jet-secondary-button>
            <x-jet-button mode="add" wire:click="saveItem()">Save</x-jet-button>
        </x-slot>
    </x-dialog-modal>
</div>
