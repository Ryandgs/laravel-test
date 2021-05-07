<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->randomElement([null, $this->faker->sentence(10)]),
            'payment' => $this->faker->randomElement(['P', 'M', 'G']),
            'costumer_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
