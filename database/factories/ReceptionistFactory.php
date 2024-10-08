<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Receptionist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receptionist>
 */
class ReceptionistFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->name,
      'email' => $this->faker->unique()->safeEmail,
      'email_verified_at' => now(),
      'password' => Hash::make('password'),
      'remember_token' => Str::random(10),
      'type' => 'receptionist',
    ];
  }
}
