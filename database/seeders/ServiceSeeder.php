<?php
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            'Home Cleaning',
            'Car Wash',
            'AC Repair',
            'Plumbing Service',
            'Electrician Service',
            'Gardening Service',
            'Pest Control',
            'Laundry & Dry Cleaning',
            'Computer Repair',
            'Painting Service',
        ];

        foreach (collect($services)->random(5) as $serviceName) {
            Service::create([
                'name'        => $serviceName,
                'description' => "We provide professional {$serviceName} at affordable prices.",
                'price'       => fake()->randomFloat(2, 50, 500),
                'status'      => true,
            ]);
        }
    }

}