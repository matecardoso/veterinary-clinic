<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { VDataTable, VIcon, VBtn, VDialog, VCard, VCardTitle, VCardText, VCardActions, VTextField, VSelect, VRow, VCol } from 'vuetify/components';

const users = ref([]);
const dialog = ref(false);
const newUser = ref({
    name: '',
    email: '',
    type: '',
    password: '',
    password_confirmation: '',
});

const headers = ref([
    { title: 'Name', key: 'name' },
    { title: 'Email', key: 'email' },
    { title: 'Type', key: 'type' },
    { title: 'Actions', key: 'actions', sortable: false }
]);

const fetchUsers = async () => {
    const response = await axios.get('/api/users');
    users.value = response.data;
};

const deleteUser = async (id) => {
    await axios.delete(`/api/users/${id}`);
    fetchUsers();
};

const createUser = async () => {
    await axios.post('/api/users', newUser.value);
    dialog.value = false;
    fetchUsers();
};

onMounted(() => {
    fetchUsers();
});
</script>

<template>
    <div>

        <v-row class="mb-5">
            <v-col>
                <h1 class="text-2xl">Manage Users</h1>
            </v-col>
            <v-col class="d-flex justify-end">
                <v-btn color="primary" @click="dialog = true">Create New User</v-btn>
            </v-col>
        </v-row>

        <v-data-table :headers="headers" :items="users" item-value="id" class="elevation-1">
            <template v-slot:[`item.actions`]="{ item }">
                <v-btn class="small bg-red ml-2" @click="deleteUser(item.id)">
                    <v-icon>mdi-delete</v-icon>
                </v-btn>
            </template>
        </v-data-table>

        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    Create New User
                </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <v-text-field label="Name" v-model="newUser.name"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field label="Email" v-model="newUser.email"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-select :items="['admin', 'doctor', 'receptionist']" label="Type"
                                v-model="newUser.type"></v-select>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field label="Password" type="password" v-model="newUser.password"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field label="Confirm Password" type="password"
                                v-model="newUser.password_confirmation"></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions>
                    <v-btn color="blue darken-1" text @click="dialog = false">Cancel</v-btn>
                    <v-btn color="blue darken-1" text @click="createUser">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
