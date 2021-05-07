<?php

namespace Database\Factories;

use App\Models\Costumers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CostumersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Costumers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'document' => $this->faker->numberBetween(11111111111, 99999999999),
            'gender' => $this->faker->randomElement(['M', 'F', 'O']),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
