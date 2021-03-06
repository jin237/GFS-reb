<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '123456', // password
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
