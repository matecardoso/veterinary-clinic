<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { VApp, VMain, VContainer, VRow, VCol, VCard, VCardTitle, VCardText, VToolbar, VToolbarTitle, VSpacer, VBtn } from 'vuetify/components';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>

    <Head title="Welcome" />
    <v-app>
        <v-main>
            <v-toolbar flat class="w-full">
                <v-container class="flex justify-between items-center">
                    <v-toolbar-title>Welcome</v-toolbar-title>
                    <nav v-if="canLogin">
                        <v-btn v-if="$page.props.auth.user" :href="route('dashboard')" text>Dashboard</v-btn>
                        <template v-else>
                            <v-btn :href="route('login')" text>Log in</v-btn>
                            <v-btn v-if="canRegister" :href="route('register')" text>Register</v-btn>
                        </template>
                    </nav>
                </v-container>
            </v-toolbar>
            <v-container>
                <v-row justify="center" class="mt-4">
                    <v-col cols="12" md="8">
                        <v-card>
                            <v-card-title class="text-h5">Hello World</v-card-title>
                            <v-card-text>
                                Lorem ipsum nisi lacus, luctus.
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>
