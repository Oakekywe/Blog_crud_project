<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContentMessage>
 */
class ContentMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // username	email	message
            "username"=>fake()->name,
            "email"=>fake()->unique()->safeEmail(),
            "message"=>fake()->sentence,
        ];
    }
}
