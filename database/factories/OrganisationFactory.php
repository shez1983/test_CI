<?php

namespace Database\Factories;

use App\Models\Cvc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisation>
 */
class OrganisationFactory extends Factory
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
            'has_volunteering_policy' => $this->faker->boolean,
            'has_volunteer_insurance' => $this->faker->boolean,
            'cvc_id' => Cvc::factory(),
        ];
    }
}
