<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super_admin@gmail.com',
            'username' => 'super_admin',
            'password' => Hash::make('super_admin'),
        ]);

         DB::table('users')->insert([
            'id' => 2,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'first_name' => 'Staff',
            'last_name' => 'Staff',
            'email' => 'staff@gmail.com',
            'username' => 'staff',
            'password' => Hash::make('staff'),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'first_name' => 'User',
            'last_name' => 'User',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => Hash::make('user'),
        ]);
    }
}
