<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorTest extends TestCase
{
	use RefreshDatabase;

	public function test_doctor_can_view_their_assigned_appointments()
	{
		$doctor = Doctor::factory()->create();

		$appointment = Appointment::factory()->create([
			'doctor_id' => $doctor->id,
			'appointment_date' => '2024-08-15',
			'animal_type' => 'dog',
		]);

		$response = $this->actingAs($doctor)->get('/appointments?doctor_id=' . $doctor->id . '&date=2024-08-15&type=dog');

		$response->assertStatus(200);
		$response->assertSee($appointment->person_name);
	}

	public function test_doctor_can_edit_their_assigned_appointments()
	{
		$doctor = Doctor::factory()->create();

		$appointment = Appointment::factory()->create([
			'doctor_id' => $doctor->id,
		]);

		$response = $this->actingAs($doctor)->put('/appointments/' . $appointment->id, [
			'person_name' => 'John Smith',
			'email' => 'john.smith@example.com',
			'pet_name' => 'Buddy',
			'animal_type' => 'dog',
			'age' => 5,
			'symptoms' => 'Coughing',
			'appointment_date' => '2024-08-15',
			'day_period' => 'MORNING',
		]);

		$response->assertStatus(302);
		$this->assertDatabaseHas('appointments', [
			'person_name' => 'John Smith',
			'email' => 'john.smith@example.com',
		]);
	}

	public function test_doctor_cannot_delete_any_appointments()
	{
		$doctor = Doctor::factory()->create();

		$appointment = Appointment::factory()->create([
			'doctor_id' => $doctor->id,
		]);

		$response = $this->actingAs($doctor)->delete('/appointments/' . $appointment->id);

		$response->assertStatus(403);
		$this->assertDatabaseHas('appointments', [
			'id' => $appointment->id,
		]);
	}
}
