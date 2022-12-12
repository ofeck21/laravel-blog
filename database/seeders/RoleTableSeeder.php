<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'          => 'Developer',
                'guard_name'    => 'web',
                'description'   => 'Role for Developer With full access.'
            ],
            [
                'name'          => 'Admin',
                'guard_name'    => 'web',
                'description'   => 'Role for Admin to manage web.'
            ],
            [
                'name'          => 'Member',
                'guard_name'    => 'web',
                'description'   => 'Role for Member.'
            ]
        ];

        foreach($roles as $role)
        {
            Role::updateOrCreate(['name' => $role['name']],$role);
        }
    }
}
