<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [$this->passwordRules(), 'alpha_dash'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ],
        [
            'name.unique' => 'Deze naam is al in gebruik.',
            'name.alpha_dash' => "De naam mag geen spaties bevatten,\n juist voorbeeld: " . str_replace(' ', '_', trim($input['name'])),
            'password.alpha_dash' => "Het wachtwoord mag geen spaties bevatten.",
        ])->validate();

        return User::create([
            'name'     => trim($input['name']),
            'email'    => trim($input['email']),
            'password' => trim(Hash::make($input['password'])),
            'role'     => 4,
            'profile_photo_path' => 'https://ui-avatars.com/api/?name=' . trim($input['name']) . '&color=7F9CF5&background=EBF4FF'
        ]);
    }
}
