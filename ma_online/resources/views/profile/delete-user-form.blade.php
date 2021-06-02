<x-jet-action-section>
    <x-slot name="title">
        <div class="text-white">
            {{ __('Verwijder account') }}
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="text-ma-white update-description">
            {{ __('Verwijder uw account definitief.') }}
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-white">
            {{ __('Zodra uw account is verwijderd, worden al zijn bronnen en gegevens permanent verwijderd. Download alle gegevens of informatie die u wilt behouden voordat u uw account verwijdert.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Verwijder account') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Verwijder uw account.') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Weet u zeker dat u uw account wilt verwijderen? Zodra uw account is verwijderd, worden al zijn bronnen en gegevens permanent verwijderd. Voer uw wachtwoord in om te bevestigen dat u uw account permanent wilt verwijderen.') }}

                <div class="mt-4" x-data="{}"
                     x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                 placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="deleteUser"/>

                    <x-jet-input-error for="password" class="mt-2"/>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Stoppen') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Verwijder account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
