<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import DeleteUserForm from './Partials/DeleteUserForm.vue'
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    mustVerifyEmail: {
        type: Boolean
    },
    status: {
        type: String
    }
})
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div class="py-5">
            <div class="container d-flex flex-column gap-4">
                <div class="card shadow">
                    <div class="card-body">
                        <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status"
                            class="max-w-xl" />
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
