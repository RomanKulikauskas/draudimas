<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reg_number' => $this->faker->unique()->regexify('[L][T][0-9]{3}'),
            'model' => $this->faker->word,
            'brand' => $this->faker->randomElement(['Toyota', 'Honda', 'Ford', 'Chevrolet'])
        ];
    }
}
