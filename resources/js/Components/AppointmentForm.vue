<script setup>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import { VForm, VTextField, VSelect, VTextarea, VBtn } from 'vuetify/components';

const form = ref({
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
const dayPeriods = ['Afternoon', 'Morning'];

const submitForm = () => {
    Inertia.post('/appointments', form.value)
        .then(() => alert('Appointment successfully scheduled!'))
        .catch(() => alert('An error occurred while scheduling the appointment.'));
};
</script>

<template>
    <v-form @submit.prevent="submitForm" class="pa-4" elevation="0" rounded>
        <v-text-field v-model="form.person_name" label="Client Name" required class="custom-text-field"
            variant="outlined" density="compact" />
        <v-text-field v-model="form.email" label="Email" required class="custom-text-field" variant="outlined"
            density="compact" />
        <v-text-field v-model="form.pet_name" label="Pet Name" required variant="outlined" density="compact" />
        <v-select v-model="form.animal_type" :items="animalTypes" label="Animal Type" required variant="outlined"
            density="compact" />
        <v-text-field v-model="form.age" label="Pet Age" required variant="outlined" density="compact" />
        <v-textarea v-model="form.symptoms" label="Symptoms" rows="4" variant="outlined" density="compact" />
        <v-text-field v-model="form.appointment_date" label="Preferred Date" type="date" required variant="outlined"
            density="compact" />
        <v-select v-model="form.day_period" :items="dayPeriods" label="Preferred Time of Day" required
            variant="outlined" density="compact" />
        <v-btn type="submit" block class="mt-2" color="primary" height="50" rounded text-color="customTextColor">
            SCHEDULE APPOINTMENT
        </v-btn>
    </v-form>
</template>
