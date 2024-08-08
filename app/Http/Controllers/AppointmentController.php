<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\AppointmentStoreRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
	public function index(Request $request)
	{
		$this->authorize('viewAny', Appointment::class);

		$appointments = Appointment::filterByDate($request->date)
			->filterByAnimalType($request->type)
			->get();

		return inertia('Appointments/Index', [
			'appointments' => $appointments,
		]);
	}

	public function store(AppointmentStoreRequest $request)
	{
		Appointment::create($request->validated());

		return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
	}

	public function show(Appointment $appointment)
	{
		$this->authorize('view', $appointment);

		return inertia('Appointments/Show', compact('appointment'));
	}

	public function update(AppointmentStoreRequest $request, Appointment $appointment)
	{
		$this->authorize('update', $appointment);

		$appointment->update($request->validated());

		return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
	}

	public function destroy(Appointment $appointment)
	{
		$this->authorize('delete', $appointment);

		$appointment->delete();

		return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
	}
}
