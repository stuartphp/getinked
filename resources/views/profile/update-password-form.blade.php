<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password">{{ __('Current Password') }}</x-label>
            <x-input id="current_password" type="password" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-error key="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password">{{ __('New Password') }}</x-label>
            <x-input id="password" type="password" wire:model.defer="state.password" autocomplete="new-password" />
            <x-error key="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation">{{ __('Confirm Password') }}</x-label>
            <x-input id="password_confirmation" type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-error key="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-jet-form-section>
