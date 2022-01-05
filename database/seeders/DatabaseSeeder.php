<?php

namespace Database\Seeders;

use App\Models\OragnizationPlan;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();
        Organization::truncate();
        OragnizationPlan::truncate();
        
        $this->call([
            UserSeeder::class,
            OrganizationSeeder::class,
            OraganizationPlanSeeder::class,
            UserOrganizationSeeder::class
        ]);
    }
}
