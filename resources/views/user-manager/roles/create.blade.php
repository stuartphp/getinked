<x-app-layout>
    <div class="py-2 px-2">
        <div class="bg-white rounded-lg shadow-md p-5">
    <x-crud-header create="false" search="false">
        <x-slot name="title"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a> / Create New</x-slot>
    </x-crud-header>

    <div class="overflow-x-auto">
        <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-4/6">
                <div class="bg-white shadow-md rounded my-6 py-3 px-3">
                    <form action="{{ route('roles.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <x-jet-label>Title</x-jet-label>
                            <x-jet-input class="block mt-1 w-full" type="text" name="title" value="" />
                        </div>
                        <div class="mt-4">
                            <x-jet-label>Permissions</x-jet-label>
                            <div class="mt-2 mb-2 grid grid-cols-6 gap-2">
                                @foreach ($permissions as $id => $permission)
                                <label for="{{ $id }}" class="flex items-center">
                                    <input type="checkbox" id="{{ $id }}" name="permissions[]" value="{{ $id }}"/>
                                    <span class="ml-2 text-sm text-gray-600">{{ ucwords(str_replace('_', ' ',$permission)) }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3 text-right">
                            <x-jet-button class="ml-4">
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>
