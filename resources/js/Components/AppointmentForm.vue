<script setup>
import { useForm } from '@inertiajs/vue3';
import { inject } from 'vue';
import { VForm, VTextField, VSelect, VTextarea, VBtn } from 'vuetify/components';

const flashSuccess = inject('flashSuccess');
const flashError = inject('flashError');

const form = useForm({
    person_name: '',
    email: '',
    pet_name: '',
    animal_type: '',
    age: '',
    symptoms: '',
    appointment_date: '',
    day_period: '',
});

const animalTypes = ['Bird', 'Cat', 'Dog', 'Other'];

const dayPeriods = [
    { title: 'Morning', value: 'MORNING' },
    { title: 'Afternoon', value: 'AFTERNOON' },
];

const submitForm = () => {
    form.post('/appointments', {
        onSuccess: () => {
            flashSuccess.value = 'Appointment created successfully';
            flashError.value = null;
            form.reset();
        },
        onError: () => {
            if (Object.keys(form.errors).length === 0) {
                flashSuccess.value = null;
                flashError.value = 'There was an issue creating the appointment';
            }
        },
    });
};
</script>

<template>
    <v-form @submit.prevent="submitForm" class="pa-4" elevation="0" rounded>
        <v-text-field v-model="form.person_name" label="Client Name" :error="form.errors.person_name" required
            variant="outlined" density="compact" />
        <v-text-field v-model="form.email" label="Email" :error="form.errors.email" required variant="outlined"
            density="compact" />
        <v-text-field v-model="form.pet_name" label="Pet Name" :error="form.errors.pet_name" required variant="outlined"
            density="compact" />
        <v-select v-model="form.animal_type" :items="animalTypes" label="Animal Type" :error="form.errors.animal_type"
            required variant="outlined" density="compact" />
        <v-text-field v-model="form.age" label="Pet Age" :error="form.errors.age" required variant="outlined"
            density="compact" />
        <v-textarea v-model="form.symptoms" label="Symptoms" :error="form.errors.symptoms" rows="4" required
            variant="outlined" density="compact" />
        <v-text-field v-model="form.appointment_date" label="Preferred Date" type="date"
            :error="form.errors.appointment_date" required variant="outlined" density="compact" />
        <v-select v-model="form.day_period" :items="dayPeriods" item-title="title" item-value="value"
            label="Preferred Time of Day" :error="form.errors.day_period" required variant="outlined"
            density="compact" />
        <v-btn type="submit" block class="mt-2" color="primary" height="50" rounded text-color="customTextColor">
            SCHEDULE APPOINTMENT
        </v-btn>
    </v-form>
</template>
