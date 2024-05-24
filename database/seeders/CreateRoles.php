<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperadmin = Role::where('name', 'superadmin')->first();
        if (!$roleSuperadmin) {
            Role::create(['name' => 'superadmin']);
        }

        $roleUser = Role::where('name', 'user')->first();
        if (!$roleUser) {
            Role::create(['name' => 'user']);
        }
    }
}
