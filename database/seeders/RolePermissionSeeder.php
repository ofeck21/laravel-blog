<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles          = Role::all();
        $permissions    = Permission::all();

        foreach ($roles as $role) {
            if($role->name == 'Admin')
            {
                foreach ($permissions as $permission) {
                    $role->givePermissionTo($permission->name);
                }
            }
        }
    }
}
