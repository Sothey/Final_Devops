<?php

namespace Database\Factories;

use App\Models\TerrainImage;
use App\Models\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainImageFactory extends Factory
{
    protected $model = TerrainImage::class;

    public function definition(): array
    {
        return [
            'terrain_id'  => Terrain::factory(),
            'image_path'  => $this->faker->imageUrl(800, 600, 'terrain-detail', true),
            'uploaded_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
