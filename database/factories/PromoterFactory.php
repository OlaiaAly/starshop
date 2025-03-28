<?php

namespace Database\Factories;

use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promoter>
 */
class PromoterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $email = $this->faker->unique()->safeEmail();
        return [
            'name' => $this->faker->name(),
            'email' => $email,
            'phone' => $this->faker->unique()->phoneNumber(),
            'document_number' => $this->faker->unique()->uuid(), // Simulated document number
            'address' => $this->faker->optional()->address(), // Optional address
            'commission_rate' => $this->faker->randomFloat(2, 0, 20), // Between 0% and 20%
            'sales_count' => $this->faker->numberBetween(0, 500),
            'total_earnings' => $this->faker->randomFloat(2, 0, 10000), // Up to 10,000 in earnings
            'status' => $this->faker->randomElement(['active', 'inactive', 'banned']),
            'password' => Hash::make($email),// Default hashed password
            'remember_token' => Str::random(10),
        ];
    }
}
