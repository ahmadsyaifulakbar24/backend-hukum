<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::create([
            'id' => '1',
            'role' => 'super_admin'
        ]);

        Role::create([
            'id' => '2',
            'role' => 'co-superadmin'
        ]);

        Role::create([
            'id' => '100',
            'role' => 'admin'
        ]);

        Role::create([
            'id' => '101',
            'role' => 'hks'
        ]);

        Role::create([
            'id' => '102',
            'role' => 'general'
        ]);
    }
}
