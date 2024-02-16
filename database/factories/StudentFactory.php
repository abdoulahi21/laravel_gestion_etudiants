<?php

namespace Database\Factories;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'first_name'=>$this->faker->firstName(),
             'last_name'=>$this->faker->lastName(),
             'age'=>$this->faker->randomElement([22,23]),
             'adresse'=>$this->faker->address(),
             'name_image'=>$this->faker->name(),
             'classe_id'=>Classe::factory()

            //
        ];
    }
}
