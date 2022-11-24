<?php

namespace Database\Factories;

use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = $this->faker->imageUrl;
        $ext = $this->faker->randomElement(
            ['jpeg', 'png', 'gif']
        );

        return [
            'name' => $image,
            'path' => $image,
            'mime_type' => 'image/'.$ext,
            'extension' => $ext,
            'size' => rand(100000, 1000000),
            'resourceable_type' => Organisation::class,
            'resourceable_id' => Organisation::factory(),
        ];
    }
}
