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
        $superman = Role::create(
            ['name' => 'superman', "guard_name" => 'web']
        );
        $superman->givePermissionTo(
            Permission::where("guard_name", "web")->get()
        );

        // Admin Permissions
        $admin = Role::create(
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
