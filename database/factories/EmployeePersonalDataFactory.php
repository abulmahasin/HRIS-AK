<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeePersonalData>
 */
class EmployeePersonalDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'employee_id'       => \App\Models\Employee::factory(), 
        'phone_number'      => $this->faker->phoneNumber(),
        'email'             => $this->faker->email(),
        'phone_number_2'    => $this->faker->boolean(40) ? $this->faker->phoneNumber() : null,
        'place_of_birth'    => $this->faker->city(),
        'gender'            => $this->faker->randomElement(['male', 'female']),
        'marital_status_id' => \App\Models\MasterMaritalStatus::inRandomOrder()->value('id'),
        'blood_type'        => $this->faker->randomElement(['A','B','AB','O']),
        'religion'          => $this->faker->randomElement(['Islam','Kristen','Katolik','Hindu','Budha']),
        'created_at'        => now(),
        'updated_at'        => now(),
    ];
}

}
