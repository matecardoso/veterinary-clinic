<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'person_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pet_name' => 'required|string|max:255',
            'animal_type' => 'required|string|max:50',
            'age' => 'required|integer|min:0',
            'symptoms' => 'required|string',
            'appointment_date' => 'required|date',
            'day_period' => 'required|in:MORNING,AFTERNOON',
            'doctor_id' => 'nullable|exists:users,id',
            'receptionist_id' => 'nullable|exists:users,id',
        ];
    }
}
