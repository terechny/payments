<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'user_id' => User::pluck('id')[$this->faker->numberBetween(1, User::count())],
            'amount' => $this->faker->randomFloat(2, 1000, 100000)
        ];
    }
}
