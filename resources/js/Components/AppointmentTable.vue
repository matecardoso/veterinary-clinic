<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const appointments = ref([]);

onMounted(async () => {
    const response = await axios.get('/api/appointments');
    appointments.value = response.data;
});

const deleteAppointment = async (id) => {
    await axios.delete(`/api/appointments/${id}`);
    appointments.value = appointments.value.filter(appointment => appointment.id !== id);
};
</script>

<template>
    <div>
        <h3>Manage Appointments</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Assigned To</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="appointment in appointments" :key="appointment.id">
                    <td class="px-6 py-4">{{ appointment.date }}</td>
                    <td class="px-6 py-4">{{ appointment.type }}</td>
                    <td class="px-6 py-4">{{ appointment.assigned_to }}</td>
                    <td class="px-6 py-4">
                        <Link :href="`/appointments/${appointment.id}/edit`">Edit</Link>
                        <button @click="deleteAppointment(appointment.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
