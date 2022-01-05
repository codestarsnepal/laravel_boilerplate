<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_organization')->insert([
            'id' => 1,
            'user_id' => 2,
            'organization_id' => 1,
            'role' => User::ROLE_SUPER_ADMIN
        ]);
        DB::table('user_organization')->insert([
            'id' => 2,
            'user_id' => 2,
            'organization_id' => 1, 
            'role' => User::ROLE_ADMIN
        ]);
        DB::table('user_organization')->insert([
            'id' => 3,
            'user_id' => 3,
            'organization_id' => 2,
            'role' => User::ROLE_USER
        ]);
        DB::table('user_organization')->insert([
            'id' => 4,
            'user_id' => 4,
            'organization_id' => 3,
            'role' => User::ROLE_USER
        ]);
    }
}
