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
        // superman will get special treatment from kripton's Gate
        Role::insert(
            ['name' => 'superman', "guard_name" => 'web']
        );

        Role::insert(
            ['name' => 'admin', "guard_name" => 'web'],
        );
        // ->givePermissionTo(
        //     ['create jamaah', 'unpublish jamaah']
        // );

        Role::insert(
            ['name' => 'staff', "guard_name" => 'web']
        );
        // ->givePermissionTo(
        //     ['create jamaah', 'unpublish jamaah']
        // );
    }
}
