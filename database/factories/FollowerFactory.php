<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $class = $this->faker->randomElement([
            Organisation::class,
            Category::class,
        ]);

        return [
            'user_id' => User::factory(),
            'followable_type' => $class,
            'followable_id' => $class::factory(),
        ];
    }
}
