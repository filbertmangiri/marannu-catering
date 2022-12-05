<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use App\Enums\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => env('ADMIN_NAME', 'Admin'),
            'email' => env('ADMIN_EMAIL', 'admin@marannu-catering.com'),
            'username' => env('ADMIN_USERNAME', 'admin'),
            'gender' => env('ADMIN_GENDER', 'male'),
            'role' => Role::Admin,
            'password' => Hash::make(env('ADMIN_PASSWORD', 'admin')),
        ]);
    }
}
