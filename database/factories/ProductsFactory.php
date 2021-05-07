<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->country(),
            'color' => $this->faker->numberBetween(11111111111, 99999999999),
            'size' => $this->faker->randomElement(['P', 'M', 'G']),
            'value' => $this->faker->randomFloat(2, 1, 2000),
        ];
    }
}
