<?php

namespace Database\Seeders;

use App\Models\Hour;
use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $opportunities = Opportunity::all();

        $users->each(function ($user) use ($opportunities) {
            Hour::factory()->count(random_int(2, 5))->create([
                'opportunity_id' => $opportunities->random()->getKey(),
                'user_id' => $user->getKey(),
            ]);
        });
    }
}
