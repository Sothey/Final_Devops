<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Terrain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('+1 day', '+1 month');
        $endDate = (clone $startDate)->modify('+' . $this->faker->numberBetween(1, 14) . ' days');

        return [
            'terrain_id'   => Terrain::factory(),
            'renter_id'    => User::factory(),
            'start_date'   => $startDate->format('Y-m-d'),
            'end_date'     => $endDate->format('Y-m-d'),
            'total_price'  => $this->faker->randomFloat(2, 50, 2000),
            'status'       => $this->faker->randomElement([
                'pending',
                'approved',
                'rejected',
                'cancelled',
                'completed',
            ]),
        ];
    }
}
