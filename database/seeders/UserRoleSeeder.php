<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 4
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 2,
            'role_id' => 3
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 3,
            'role_id' => 2
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 4,
            'role_id' => 1
        ]);
    }
}
