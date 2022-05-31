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
            'name' => 'Super Admin',
            'email' => 'superadmin@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'Super Admin',
            'password' => Hash::make('12345678'), // password
            'role' => 'super_admin',
        ]);

        User::create([
            'id' => '963dc995-9d95-4d35-a1d3-c4496624cf1d',
            'name' => 'Nurhilmi',
            'email' => 'nurhilmi@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'General User',
            'password' => Hash::make('12345678'), // password
            'role' => 'general',
        ]);

        User::create([
            'id' => '56098235-be55-44d9-bf99-60fc4bc41af1',
            'name' => 'Birohks',
            'email' => 'birohks@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'Birohks',
            'password' => Hash::make('12345678'), // password
            'role' => 'hks',
        ]);
    }
}
