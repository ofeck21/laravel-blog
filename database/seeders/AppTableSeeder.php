<?php

namespace Database\Seeders;

use App\Models\App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App::firstOrCreate([
            'logo'      => 'logo.png',
            'favicon'   => 'favicon.png',
            'name'      => 'Laravel Blog',
            'description' => 'Laravel Blog',
            'keyword'   => 'Laravel Blog',
            'author'    => 'Mohammad Rofik'
        ]);
    }
}
