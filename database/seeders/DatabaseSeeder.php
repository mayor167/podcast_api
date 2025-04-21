<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Podcast;
use App\Models\Episode;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 5 categories
        $categories = Category::factory()->count(5)->create();

        // For each category, create 3 podcasts
        $categories->each(function ($category) {
            Podcast::factory()->count(3)->create([
                'category_id' => $category->id,
            ])->each(function ($podcast) {
                // For each podcast, create 5 episodes
                Episode::factory()->count(5)->create([
                    'podcast_id' => $podcast->id,
                ]);
            });
        });
    }
}