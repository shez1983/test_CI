<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = fake()->randomElement([1, 2, 3]);
        $dateTime = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'rejected_at' => $status === 2 ? $dateTime : null,
            'approved_at' => $status === 3 ? $dateTime : null,
            'rejected_reason' => $status === 2 ? fake()->sentence : null,
            'status_id' => $status,
        ];
    }
}
