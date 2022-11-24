<?php

namespace Database\Factories;

use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hour>
 */
class HourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = rand(1, 3);
        $minutes = rand(30, 180);
        $dateTime = $this->faker->dateTimeBetween('-1 year', 'now');

        return [
            'user_id' => User::factory(),
            'opportunity_id' => Opportunity::factory(),
            'amount' => $minutes,
            'rejected_at' => $status === 1 ? $dateTime : null,
            'approved_at' => $status === 2 ? $dateTime : null,
            'rejected_reason' => $this->faker->sentence,
        ];
    }
}
