<?php

namespace Database\Seeders;

use App\Models\Cvc;
use App\Models\VolunteerCentre;
use Illuminate\Database\Seeder;

class VolunteerCentreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 volunteer centres per CVC...
        Cvc::all()->each(function ($cvc) {
            VolunteerCentre::factory()->count(5)->create([
                'cvc_id' => $cvc->getKey(),
            ]);
        });
    }
}
