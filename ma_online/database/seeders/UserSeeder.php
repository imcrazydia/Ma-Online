<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superUser = [
            [
                'id'       => 1,
                'name'     => 'Ma Online',
                'email'    => 'maonline@gmail.com',
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'role'     => 1,
            ],
        ];

        User::insert($superUser);
    }
}
