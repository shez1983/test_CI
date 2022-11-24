<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'addressable_id' => Profile::factory(),
            'addressable_type' => Profile::class,
            'address_line_1' => $this->faker->streetName,
            'address_line_2' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'county' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'w3w' => implode('.', $this->faker->words),
        ];
    }
}
