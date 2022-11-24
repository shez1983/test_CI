<?php

namespace Database\Factories;

use App\Models\Cvc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VolunteerCentre>
 */
class VolunteerCentreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->unique()->sentence(4)),
            'cvc_id' => Cvc::factory(),
        ];
    }
}
