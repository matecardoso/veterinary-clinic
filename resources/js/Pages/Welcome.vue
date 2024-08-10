<script setup>
import { Head } from '@inertiajs/vue3';
import { VApp, VMain, VContainer, VRow, VCol, VToolbar, VToolbarTitle } from 'vuetify/components';
import AppointmentForm from '@/Components/AppointmentForm.vue';
</script>

<template>

    <Head title="Welcome" />
    <v-app>
        <v-toolbar color="white" class="px-8">
            <v-toolbar-title class="text-primary" style="margin-left: 16px; font-size: 30px; font-weight: 700;">
                O Patusco
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <a :href="route('login')" class="text-primary"
                style="font-weight: 600; font-size: 18px; margin-right: 16px;">
                Log In
            </a>
        </v-toolbar>

        <v-main class="bg-cover" style="background: url('/images/fundo-1.jpg') no-repeat center;">
            <v-container class="py-8" fluid>
                <v-row justify="space-between" align="center" class="pa-4 rounded"
                    style="max-width: 1200px; margin: auto; background-color: rgba(255, 255, 255, 0.8); padding: 16px; border-radius: 8px;">
                    <v-col md="7" sm="12">
                        <h1 class="text-primary mb-4" style="font-size: 36px; line-height: 1.2; font-weight: 700;">
                            The Best Care for Your Beloved Pet
                        </h1>
                        <p class="text-primary" style="font-size: 20px;">
                            Your pet deserves the best care, and at O Patusco, we ensure just that. Our team of
                            experienced veterinarians is dedicated to providing top-notch medical services with
                            a touch of love and care.
                        </p>
                        <p class="text-primary" style="font-size: 20px;">
                            Scheduling an appointment with us is easy! Simply fill out the form to the right,
                            providing details about your pet and the type of service you need. Our team will
                            confirm your appointment and ensure that your pet receives the attention they deserve.
                        </p>
                        <p class="text-primary" style="font-size: 20px; margin-top: 12px;">
                            <strong>Why Choose Us?</strong>
                        <ul style="margin-left: 20px; margin-top: 12px;">
                            <li>Expert Veterinary Care</li>
                            <li>Compassionate and Friendly Staff</li>
                            <li>State-of-the-art Facilities</li>
                            <li>Convenient Appointment Scheduling</li>
                        </ul>
                        </p>
                        <p class="text-primary" style="font-size: 20px; margin-top: 12px;">
                            Don't wait—book your appointment today and give your pet the care they deserve. We are
                            here to help your furry friend live a happy, healthy life!
                        </p>
                    </v-col>
                    <v-col md="5" sm="12">
                        <appointment-form></appointment-form>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>
