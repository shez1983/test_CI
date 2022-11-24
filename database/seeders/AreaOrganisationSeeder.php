<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Organisation;
use Illuminate\Database\Seeder;

class AreaOrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = Area::all();

        Organisation::all()->each(function ($organisation) use ($areas) {
            $organisation->areas()->sync(
                $areas->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
