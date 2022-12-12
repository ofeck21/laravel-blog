<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['email' => 'rofik@programmer.net'],[
            'name'      => 'Rofik',
            'email'     => 'rofik@programmer.net',
            'password'  => Hash::make('admin123'),
            'email_verified_at' => Carbon::now('Asia/Jakarta')
        ]);
    }
}
