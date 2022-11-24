<?php

namespace Database\Seeders;

use App\Models\Cvc;
use App\Models\Organisation;
use App\Models\Resource;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 organisations per CVC...
        Cvc::all()->each(function ($cvc) {
            Organisation::factory()
                ->count(5)
                ->hasImage(Resource::factory())
                ->create(['cvc_id' => $cvc->getKey()]);
        });

        // Assign sub orgs...
        $parents = Organisation::all()->random(20);
        $subSlices = Organisation::whereNotIn('id', $parents->pluck('id')->toArray())
            ->limit(200)
            ->get()
            ->split(40);

        foreach ($parents as $i => $parent) {
            $subs = $subSlices[$i];
            $subs->each(function ($sub) use ($parent) {
                $sub->parent()->associate($parent)->save();
            });
        }
    }
}
