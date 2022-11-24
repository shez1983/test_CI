<?php

namespace Database\Factories;

use App\Models\ContactType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'name' => $this->faker->name,
            'phone' => $this->faker->e164PhoneNumber,
            'relationship' => ucfirst($this->faker->sentence(2)),
            'user_id' => User::factory(),
            'contact_type_id' => ContactType::factory(),
        ];
    }
}
