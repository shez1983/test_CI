<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CvcSeeder::class,
            VolunteerCentreSeeder::class,
            CategorySeeder::class,
            OrganisationSeeder::class,
            UserSeeder::class,
            FollowerSeeder::class,
            StatusSeeder::class,
            OpportunitySeeder::class,
            OpportunityRequestSeeder::class,
            HourSeeder::class,
            AreaSeeder::class,
            AreaOrganisationSeeder::class,
            ContactTypeSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
