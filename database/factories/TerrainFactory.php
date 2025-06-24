<?php

namespace Database\Factories;

use App\Models\Terrain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainFactory extends Factory
{
    protected $model = Terrain::class;

    public function definition(): array
    {
        return [
            'owner_id'       => User::factory(),
            'title'          => $this->faker->sentence(3),
            'description'    => $this->faker->paragraph(),
            'location'       => $this->faker->city() . ', ' . $this->faker->country(),
            'area_size'      => $this->faker->randomFloat(2, 50, 1000),
            'price_per_day'  => $this->faker->randomFloat(2, 10, 500),
            'available_from' => $this->faker->date('Y-m-d', '+1 week'),
            'available_to'   => $this->faker->date('Y-m-d', '+3 months'),
            'is_available'   => $this->faker->boolean(),
            'main_image'     => $this->faker->imageUrl(640, 480, 'terrain', true),
        ];
    }
}
