<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $note = [
            \App\Models\User::class,
            \App\Models\Country::class,
        ];
        return [
            'url'   => $this->faker->imageUrl($width=400, $height=200),
            'imagable_type'    => $this->faker->randomElement($note),
            'imagable_id'   => $this->faker->numberBetween(1,10),
        ];
    }
}
