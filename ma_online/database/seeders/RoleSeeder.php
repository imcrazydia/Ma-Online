<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'        => 1,
                'role_name' => 'Admin',
            ],
            [
                'id'        => 2,
                'role_name' => 'Docent',
            ],
            [
                'id'        => 3,
                'role_name' => 'Student',
            ],
            [
                'id'        => 4,
                'role_name' => 'Gebruiker',
            ],
        ];

        Role::insert($roles);
    }
}
