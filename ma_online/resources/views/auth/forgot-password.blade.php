<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        </x-slot>

        <img class="h-20 relative image-center" src="img/logo-ma-online.png">

        <div class="mb-4 mt-6 text-sm text-white">
            {{ __('Wachtwoord vergeten? Geen probleem. Vul hieronder gewoon je email adres in en wij zullen u een link sturen om het wachtwoord te resetten.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="flex items-center justify-end mt-4 ">
                <x-jet-button class="bg-ma-magenta">
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
