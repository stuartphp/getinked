<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <div class="grid grid-cols-3 mb-2">
            <div class="text-xl">{{ __('Products') }}</div>
            <div>
                <a href="#" class="hover:text-indigo-500" wire:click="$emitTo('products.index-child', 'showCreateForm');">
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
    
    <table class="table w-full mt-3">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">
                    <a href="#" wire:click="sortBy('code')">
                        <div class="flex items-center">
                            <div>code</div>
                            <x-icon-sort sortField="code" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                        </div>
                    </a>
                </th>
                <th class="py-3 px-6 text-left">
                    <a href="#" wire:click="sortBy('name')">
                        <div class="flex items-center">
                            <div>Name</div>
                            <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                        </div>
                    </a>
                </th>
                <th class="py-3 px-6 text-center">On Hand</th>
                <th class="py-3 px-6 text-center">Price</th>
                <th class="py-3 px-6 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($data as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        {{ $item->code }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $item->name }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $item->on_hand }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $item->cost_price }}
                    </td>
                    <td class="py-3 px-6 ">
                        <div class="flex item-end justify-end">
                            <x-edit-button component='products.index-child' id="{{ $item->id }}"/>
                            <x-delete-button component='products.index-child' id="{{ $item->id }}"/>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
    @livewire('products.index-child')
</div>
