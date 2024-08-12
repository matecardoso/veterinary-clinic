<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { computed } from 'vue';
import UserTable from '@/Components/UserTable.vue';
import AppointmentTable from '@/Components/AppointmentTable.vue';
import DoctorAppointmentTable from '@/Components/DoctorAppointmentTable.vue';

const props = defineProps(['auth']);
const userType = computed(() => props.auth.user.type);
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <UserTable v-if="userType === 'admin'" />
                        <AppointmentTable v-if="userType === 'receptionist'" />
                        <DoctorAppointmentTable v-if="userType === 'doctor'" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
