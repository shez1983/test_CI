<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Opportunity;
use App\Models\Organisation;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = Status::all();
        $users = User::all();
        $organisations = Organisation::all();
        $categories = Category::all();

        $organisations->each(function ($organisation) use ($statuses, $users, $categories) {
            for ($x = 0; $x <= 3; $x++) {
                Opportunity::factory()->create([
                    'organisation_id' => $organisation->getKey(),
                    'status_id' => $statuses->random()->getKey(),
                    'user_id' => $users->random()->getKey(),
                ])
                    ->categories()
                    ->sync($categories->random(rand(1, 4))->pluck('id')->toArray());
            }
        });
    }
}
