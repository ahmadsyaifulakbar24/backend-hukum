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
            'password' => Hash::make('12345678'),
            'role' => 'super_admin',
        ]);

        User::create([
            'id' => '963dc995-9d95-4d35-a1d3-c4496624cf1d',
            'name' => 'Nurhilmi',
            'email' => 'nurhilmi@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'General User',
            'password' => Hash::make('12345678'),
            'role' => 'general',
        ]);

        User::create([
            'id' => '503dc9bb-b2ac-420d-ab22-679e66877427',
            'name' => 'Metty Kusmayantie',
            'email' => 'metty@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('kabagPUU'),
            'role' => 'super_admin',
        ]);

        User::create([
            'id' => '41913989-da8e-4617-9c2d-0317d5ef65f1',
            'name' => 'Istiani Erawati',
            'email' => 'istiani@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'Co Super Admin',
            'password' => Hash::make('kasubagUMKM'),
            'role' => 'co-superadmin',
        ]);

        User::create([
            'id' => '6ea22728-878e-48ce-b6be-0b44bade1e3f',
            'name' => 'Feraldi Candra Heraton',
            'email' => 'feraldi@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'Co Super Admin',
            'password' => Hash::make('kasubagKoperasi'),
            'role' => 'co-superadmin',
        ]);

        User::create([
            'id' => '1ef6087f-9ddc-4f22-8f96-db0c3d7b59cf',
            'name' => 'Kartikasasi Ari S',
            'email' => 'kartikasasi@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU1'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => '826fea72-1cac-44fd-9e18-de876f17c7f1',
            'name' => 'Aulia Fusi Pratami',
            'email' => 'aulia@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU2'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => 'a351a80c-07f6-4cdb-a207-c7a073825fee',
            'name' => 'Franciska K. Rorong',
            'email' => 'franciska@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU3'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => '4c6894ef-85d5-4040-a0d3-f75b3b616d72',
            'name' => 'Dwie Riawelly Charisma',
            'email' => 'dwiecharisma@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU4'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => 'f0b0a146-0a28-43ff-9c58-3afadd9d40e3',
            'name' => 'Elsi Viana',
            'email' => 'elsi@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU5'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => '23f38402-a2cb-4baa-ab1e-64d3ac662244',
            'name' => 'Wesli Yenni Roi Purba',
            'email' => 'wesli@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU6'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => '128af30c-a4b1-43b3-b9ea-12ebf366bde5',
            'name' => 'Miftahuddin Irvani',
            'email' => 'irvan@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU7'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => '53b06bf9-ce91-4f06-a46c-6ec575b1d158',
            'name' => 'indira Devitasari',
            'email' => 'indira@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU8'),
            'role' => 'hks',
        ]);

        User::create([
            'id' => 'f3c51c4b-989f-4ff2-a840-9d0d55196bc0',
            'name' => 'John Roy Peday',
            'email' => 'john@kemenkopukm.go.id',
            'email_verified_at' => now(),
            'position' => 'HKS',
            'password' => Hash::make('perancangPUU9'),
            'role' => 'hks',
        ]);
    }
}
