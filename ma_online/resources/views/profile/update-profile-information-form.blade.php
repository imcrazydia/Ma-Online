<link rel="stylesheet" href="{{ asset('css/style.css')}}">
<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <div class="text-ma-white">
        {{ __('Profiel Details') }}
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="text-ma-white update-description">
        {{ __('Update je profiel, informatie en email adres.') }}
        </div>
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <x-jet-label for="photo" value="{{ __('Foto') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_path }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Naam') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Opgeslagen.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Opslaan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
