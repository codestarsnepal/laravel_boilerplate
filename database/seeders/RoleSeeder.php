<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'customer',
            'status' => 1,
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'staff',
            'status' => 1
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'admin',
            'status' => 1
        ]);

        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'super_admin',
            'status' => 1
        ]);
    }
}
