<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name'  => 'Dashboard',
                'url'   => '/',
                'icon'  => 'home',
                'slug'  => 'dasboard'
            ],
            [
                'name'  => 'Application',
                'slug'  => 'application',
                'header'=> true,
            ],
            [
                'name'  => 'Posts',
                'url'   => '/posts',
                'icon'  => 'file-text',
                'slug'  => 'post',
                'features'  => '["view","create","update","delete", "import", "export"]'
            ],
            [
                'name'  => 'Pages',
                'url'   => '/pages',
                'icon'  => 'file',
                'slug'  => 'page',
                'features'  => '["view","create","update","delete", "import", "export"]'
            ],
            [
                'name'  => 'Comments',
                'url'   => '/comments',
                'icon'  => 'message-square',
                'slug'  => 'comment',
                'features'  => '["view","create","update","delete", "export"]'
            ],
            [
                'name'  => 'Members',
                'url'   => '/members',
                'icon'  => 'user',
                'slug'  => 'member',
                'features'  => '["view","create","update","delete", "import", "export"]'
            ],
            [
                'name'  => 'Settings',
                'slug'  => 'setting',
                'header'=> true,
            ],
            [
                'name'  => 'Users',
                'url'   => '/users',
                'icon'  => 'user',
                'slug'  => 'user',
                'features'  => '["view","create","update","delete", "import", "export"]'
            ],
            [
                'name'  => 'Roles',
                'url'   => '/roles',
                'icon'  => 'shield',
                'slug'  => 'role',
                'features'  => '["view","create","update","delete", "import", "export"]'
            ],
            [
                'name'  => 'General',
                'url'   => '/general',
                'icon'  => 'settings',
                'slug'  => 'general',
                'features'  => '["view","update"]'
            ]
        ];

        $order = 1;
        foreach ($modules as $module) {
            $parent = Module::updateOrCreate(['name'  => $module['name']],[
                'name'  => $module['name'],
                'url'   => $module['url'] ?? null,
                'icon'  => $module['icon'] ?? null,
                'slug'  => $module['slug'] ?? null,
                'header'=> $module['header'] ?? false,
                'order' => $order,
                'features' => $module['features'] ?? '["view"]'
            ]);

            $order++;

            if(array_key_exists('child', $module)){
                $order_child = 1;
                foreach($module['child'] as $child){
                    Module::updateOrCreate(['name'  => $child['name']],[
                        'parent'=> $parent->id,
                        'name'  => $child['name'],
                        'url'   => $child['url'] ?? null,
                        'icon'  => $child['icon'] ?? null,
                        'slug'  => $child['slug'] ?? null,
                        'order' => $order_child,
                        'features' => $module['features'] ?? '["view"]'
                    ]);
                    $order_child++;
                }
            }
        }
    }
}
