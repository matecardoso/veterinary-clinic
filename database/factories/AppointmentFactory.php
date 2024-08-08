<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
  protected $model = Appointment::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'person_name' => $this->faker->name,
      'email' => $this->faker->safeEmail,
      'pet_name' => $this->faker->firstName,
      'animal_type' => $this->faker->randomElement(['dog', 'cat', 'bird']),
      'age' => $this->faker->numberBetween(1, 15),
      'symptoms' => $this->faker->sentence,
      'appointment_date' => $this->faker->date,
      'day_period' => $this->faker->randomElement(['MORNING', 'AFTERNOON']),
      'doctor_id' => null,
      'receptionist_id' => null,
    ];
  }
}
