<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Testing accounts
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@marannu-catering.com',
            'username' => 'admin',
            'gender' => Gender::Male,
            'role' => Role::Admin,
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@marannu-catering.com',
            'username' => 'moderator',
            'gender' => Gender::Male,
            'role' => Role::Moderator,
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@marannu-catering.com',
            'username' => 'employee',
            'gender' => Gender::Male,
            'role' => Role::Employee,
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@marannu-catering.com',
            'username' => 'user',
            'gender' => Gender::Male,
            'role' => Role::User,
            'password' => Hash::make('password'),
        ]);

        User::factory(50)->create();
    }
}
