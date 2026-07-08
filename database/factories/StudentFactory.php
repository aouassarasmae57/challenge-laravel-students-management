<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
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
            'name' => fake()->name(),
            'email' =>fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'section' => fake()->randomElement(['IT' , 'Math' , 'Physics' ,'Biology' ,'Network' ,'Marketing']),
            'description' =>fake()->text(),
            'image' => 'default.png'
        ];
    }
}
