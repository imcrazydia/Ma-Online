<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <link rel="stylesheet" href="{{ asset('css/style.css')}}">
            <!-- <x-jet-authentication-card-logo /> -->

        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <form class="authentication-position" method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="pt-6 pb-6">Gebruik je studentennummer om in te loggen
                <h1>

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Wachtwoord') }}"/>
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                     autocomplete="current-password"/>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember"/>
                            <span class="ml-2 text-sm text-white">{{ __('Onthoud mij') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-white text-magenta"
                               href="{{ route('password.request') }}">
                                {{ __('Wachtwoord vergeten?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4 bg-ma-magenta">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
