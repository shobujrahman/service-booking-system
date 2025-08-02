<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'name'     => 'Admin1 User',
            'email'    => 'admin1@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

// Create 5 random users using factory
        User::factory(5)->create();

    }
}