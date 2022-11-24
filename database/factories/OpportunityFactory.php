<?php

namespace Database\Factories;

use App\Models\Organisation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-3 years', '-1 years');
        $endDate = $this->faker->dateTimeBetween('now', '+5 years');

        return [
            'organisation_id' => Organisation::factory(),
            'user_id' => User::factory(),
            'status_id' => rand(1, 3),
            'reference' => $this->faker->ean13,
            'slug' => $this->faker->slug,
            'title' => ucfirst($this->faker->unique()->sentence),
            'title_w' => ucfirst($this->faker->unique()->sentence),
            'description' => $this->faker->paragraph,
            'description_w' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'live_at' => $this->faker->dateTimeBetween('-1 years'),
            'publish_expiry_date' => $endDate,
            'live_at' => $endDate,
            'started_at' => $startDate,
            'expires_at' => $endDate,
            'start_time' => $startDate,
            'end_time' => $endDate,
        ];
    }
}
