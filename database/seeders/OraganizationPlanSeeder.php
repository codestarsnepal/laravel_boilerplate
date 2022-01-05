<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OraganizationPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organization_plan')->insert([
            'id' => 1,
            'name' => 'Retailer',
            'status' => 1
        ]);

        DB::table('organization_plan')->insert([
            'id' => 2,
            'name' => 'Wholesaller',
            'status' => 1
        ]);
        DB::table('organization_plan')->insert([
            'id' => 3,
            'name' => 'Both',
            'status' => 1
        ]);
    }
}
