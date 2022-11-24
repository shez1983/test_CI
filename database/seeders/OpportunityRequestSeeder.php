<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OpportunityRequest;
use App\Models\User;
use Illuminate\Database\Seeder;

class OpportunityRequestSeeder extends Seeder
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

        $users->random(10)->each(function ($user) use ($opportunities) {
            OpportunityRequest::factory()->create([
                'opportunity_id' => $opportunities->random()->getKey(),
                'user_id' => $user->getKey(),
            ]);
        });
    }
}
