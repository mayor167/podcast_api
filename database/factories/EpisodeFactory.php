<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    public function definition()
    {
        return [
            'podcast_id' => \App\Models\Podcast::factory(),
            'title' => $this->faker->sentence,
            'audio_url' => $this->faker->url,
            'duration' => $this->faker->numberBetween(300, 3600), // 5min to 1hr
        ];
    }
}