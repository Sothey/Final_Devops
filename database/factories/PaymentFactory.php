<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'booking_id'      => Booking::factory(),
            'payment_method'  => $this->faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            'amount_paid'     => $this->faker->randomFloat(2, 20, 2000),
            'payment_date'    => $this->faker->dateTimeBetween('-6 months', 'now'),
            'status'          => $this->faker->randomElement(['paid', 'failed', 'refunded']),
            'transaction_id'  => $this->faker->uuid(),
        ];
    }
}
