<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PodcastFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'category_id' => \App\Models\Category::factory(),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
        ];
    }
}