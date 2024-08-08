<?php

namespace Tests\Feature;

use App\Models\Receptionist;
use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReceptionistTest extends TestCase
{
  use RefreshDatabase;

  public function test_receptionist_can_view_appointments_by_date_and_animal_type()
  {
    $receptionist = Receptionist::factory()->create();

    $appointment = Appointment::factory()->create([
      'appointment_date' => '2024-08-15',
      'animal_type' => 'dog',
    ]);

    $response = $this->actingAs($receptionist)->get('/appointments?date=2024-08-15&type=dog');

    $response->assertStatus(200);
    $response->assertSee($appointment->person_name);
  }

  public function test_receptionist_can_create_an_appointment()
  {
    $receptionist = Receptionist::factory()->create();

    $response = $this->actingAs($receptionist)->post('/appointments', [
      'person_name' => 'Jane Doe',
      'email' => 'jane@example.com',
      'pet_name' => 'Max',
      'animal_type' => 'cat',
      'age' => 3,
      'symptoms' => 'Sneezing',
      'appointment_date' => '2024-08-20',
      'day_period' => 'AFTERNOON',
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('appointments', [
      'person_name' => 'Jane Doe',
      'email' => 'jane@example.com',
    ]);
  }

  public function test_receptionist_can_edit_an_appointment()
  {
    $receptionist = Receptionist::factory()->create();

    $appointment = Appointment::factory()->create();

    $response = $this->actingAs($receptionist)->put('/appointments/' . $appointment->id, [
      'person_name' => 'John Smith',
      'email' => 'john.smith@example.com',
      'pet_name' => 'Buddy',
      'animal_type' => 'dog',
      'age' => 5,
      'symptoms' => 'Coughing',
      'appointment_date' => '2024-08-15',
      'day_period' => 'MORNING',
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseHas('appointments', [
      'person_name' => 'John Smith',
      'email' => 'john.smith@example.com',
    ]);
  }

  public function test_receptionist_can_delete_an_appointment()
  {
    $receptionist = Receptionist::factory()->create();

    $appointment = Appointment::factory()->create();

    $response = $this->actingAs($receptionist)->delete('/appointments/' . $appointment->id);

    $response->assertStatus(200);
    $this->assertSoftDeleted('appointments', [
      'id' => $appointment->id,
    ]);
  }
}
