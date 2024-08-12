<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const appointments = ref([]);

onMounted(async () => {
    const response = await axios.get('/api/appointments/doctor');
    appointments.value = response.data;
});
</script>

<template>
    <div>
        <h3>Your Appointments</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="appointment in appointments" :key="appointment.id">
                    <td class="px-6 py-4">{{ appointment.date }}</td>
                    <td class="px-6 py-4">{{ appointment.type }}</td>
                    <td class="px-6 py-4">
                        <Link :href="`/appointments/${appointment.id}/edit`">Edit</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
