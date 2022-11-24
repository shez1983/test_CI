<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $now = now();

        $birthday = $now->copy()->subDays(rand(6504, 26592))->toDateString();
        $dbsExpiry = $now->copy()->addDays(rand(365, 1460))->toDateString();

        return [
            'user_id' => User::factory(),
            'reference' => $this->faker->ean13,
            'passport_uuid' => $this->faker->uuid,
            'speaks_welsh' => $this->faker->boolean(),
            'use_welsh' => $this->faker->boolean(20),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'birthday' => $birthday,
            'is_emergency_volunteer' => $this->faker->boolean(20),
            'dbs_expires_at' => $dbsExpiry,
            'has_disability' => $this->faker->boolean(2),
            'emergency_contact_name' => $this->faker->name,
            'emergency_contact_phone' => $this->faker->e164PhoneNumber,
        ];
    }
}
