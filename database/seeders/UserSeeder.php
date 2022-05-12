<?php

namespace Database\Seeders;

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
        User::create([
            'id' => '9f0d34f7-9f9e-4f3c-b067-8a50bff6a67d',
            'name' => 'Admin',
            'email' => 'admin@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'Admin',
            'password' => Hash::make('12345678'), // password
            'role' => 'admin',
        ]);
    }
}
