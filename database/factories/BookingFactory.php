<?php
namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Booking::class; // ✅ LINK MODEL TO FACTORY

    public function definition(): array
    {
        return [
            'user_id'      => User::factory(),    // will create a user if not provided
            'service_id'   => Service::factory(), // will create a service if not provided
            'booking_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status'       => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];

    }
}
