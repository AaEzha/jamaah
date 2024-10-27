<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Permissions
        Role::create(
            ['name' => 'admin', "guard_name" => 'web'],
        );
        // $admin->givePermissionTo(
        //     ['create jamaah', 'unpublish jamaah']
        // );

        Role::create(
            ['name' => 'staff', "guard_name" => 'web']
        );
        // ->givePermissionTo(
        //     ['create jamaah', 'unpublish jamaah']
        // );
    }
}
