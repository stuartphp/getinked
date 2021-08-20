<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <x-crud-header create="{{ route('roles.create') }}">
            <x-slot name="title"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></x-slot>
        </x-crud-header>
        <x-table>
            <x-slot name="header">
                <x-th-sort field="title">
                    <div>Title</div>
                    <x-icons.sort sortField="title" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                </x-th-sort>
                <x-th>
                    Permissions
                </x-th>
                <x-th></x-th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        {{ $item->title }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="grid lg:grid-cols-7 md:grid-cols-4 sm:grid-cols-2  gap-1">
                        @foreach ($item->permissions as $permission)
                            <div class="bg-purple-100 text-purple-600 py-1 px-3 rounded-full text-xs mb-3">{{ ucwords(str_replace('_', ' ',$permission->title)) }}</div>
                        @endforeach
                    </div>
                    </td>
                    <td class="py-3 px-6 ">
                        <div class="flex item-end justify-end">
                            <x-action-dropdown id="{{ $item->id }}">
                                <x-action-link id="{{ $item->id}}" link="edit" :route="route('roles.edit', [ $item->id ])"/>
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
            <form action="{{ route('roles.destroy', [$primaryKey]) }}" id="DelForm" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('DELETE')
    <x-confirmation-modal wire:model="confirmingItemDeletion">

        <x-slot name="title">Delete</x-slot>
        <x-slot name="content">Are you sure you want to delete this record?</x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" type="submit">
                {{ __('Delete Record') }}
            </x-jet-danger-button>
        </x-slot>

    </x-confirmation-modal></form>
</div>
