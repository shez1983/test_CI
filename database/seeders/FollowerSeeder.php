<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $followableModels = [
            Organisation::class,
            Category::class,
        ];

        foreach ($followableModels as $model) {
            $model::all()->each(function ($entity) use ($users) {
                for ($x = 0; $x <= rand(1, 2); $x++) {
                    $entity->followers()->toggle($users->random()->getKey());
                }
            });
        }
    }
}
