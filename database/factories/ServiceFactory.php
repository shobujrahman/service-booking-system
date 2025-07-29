<?php
namespace Database\Factories;

use App\Models\Service; // ✅ CORRECT MODEL
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class; // ✅ LINK MODEL TO FACTORY

    public function definition(): array
    {
        return [
            'name'        => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price'       => $this->faker->randomFloat(2, 50, 500),
            'status'      => true,
        ];
    }
}
