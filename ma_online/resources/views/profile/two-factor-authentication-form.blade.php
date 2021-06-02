<x-jet-action-section>
    <x-slot name="title">
        <div class="text-ma-white">
            {{ __('Twee stappen verificatie ') }}
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="text-ma-white update-description">
            {{ __('Voeg extra beveiliging aan uw account toe door middel van twee stappen verificatie.') }}
        </div>
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-white">
            @if ($this->enabled)
                {{ __('Je hebt twee stappen verificatie momenteel ingeschakeld.') }}
            @else
                {{ __('Je hebt momenteel niet twee stappen verificatie ingeschakeld') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-white">
            <p>
                {{ __('Als tweefactorauthenticatie is ingeschakeld, wordt u tijdens de authenticatie om een ​​veilig, willekeurig token gevraagd. U kunt dit token ophalen uit de Google Authenticator-applicatie van uw telefoon.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-white">
                    <p class="font-semibold">
                        {{ __('Twee-factor-authenticatie is nu ingeschakeld. Scan de volgende QR-code met de verificatietoepassing van uw telefoon.') }}
                    </p>
                </div>

                <div class="mt-4 dark:p-4 dark:w-56 dark:bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-white">
                    <p class="font-semibold">
                        {{ __('Bewaar deze herstelcodes in een veilige wachtwoordbeheerder. Ze kunnen worden gebruikt om de toegang tot uw account te herstellen als uw apparaat voor tweefactorauthenticatie verloren is gegaan.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Aanzetten') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Genereer "recovery codes".') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Laat de "recovery codes" zien') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('Uitzetten') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
