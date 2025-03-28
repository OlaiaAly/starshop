<?php

namespace Database\Factories;

use App\Models\Promoter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper(Str::random(10)), // Random unique coupon code
            'discount' => $this->faker->randomFloat(2, 5, 50), // Random discount between 5 and 50
            'type' => $this->faker->randomElement(['fixed', 'percentage']), // Either fixed or percentage
            'promoter_id' => Promoter::inRandomOrder()->value('id'), // Random promoter or null
            'usage_limit' => $this->faker->optional()->numberBetween(10, 500), // Optional usage limit
            'times_used' => 0, // Default to 0
            'expires_at' => $this->faker->optional(0.8)->dateTimeBetween('now', '+1 year'), // 80% chance of expiration date
        ];
    }
}
