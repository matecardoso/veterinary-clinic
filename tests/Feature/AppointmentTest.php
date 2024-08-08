<?php

namespace Tests\Feature;

use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
  use RefreshDatabase;

  public function test_client_can_create_an_appointment()
  {
    $response = $this->post('/appointments', [
      'person_name' => 'John Doe',
      'email' => 'john@example.com',
      'pet_name' => 'Buddy',
      'animal_type' => 'dog',
      'age' => 5,
      'symptoms' => 'Coughing',
      'appointment_date' => '2024-08-15',
      'day_period' => 'MORNING',
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('appointments', [
      'person_name' => 'John Doe',
      'email' => 'john@example.com',
    ]);
  }
}
