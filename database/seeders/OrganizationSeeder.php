<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'id' => 1,
            'name' => 'Madhu Traders Pvt. Ltd',
            'address' => 'address',
            'contact_number' => '9851254639',
            'vat_number' => '12345/456',
            'email_address' => "madhu@gmail.com",
            'plan_id' => 1
        ]);
        DB::table('organizations')->insert([
            'id' => 2,
            'name' => 'Arun Traders Pvt. Ltd',
            'address' => 'Arun address',
            'contact_number' => '9851254639',
            'vat_number' => '12345/456',
            'email_address' => "arun@gmail.com",
            'plan_id' => 2
        ]);
        DB::table('organizations')->insert([
            'id' => 3,
            'name' => 'Himal Traders Pvt. Ltd',
            'address' => 'Himal address',
            'contact_number' => '9851254639',
            'vat_number' => '12345/456',
            'email_address' => "himal@gmail.com",
            'plan_id' => 3
        ]);
    }
}
