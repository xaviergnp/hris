<template>
    <Head title="Roles and Permissions" />
    <AdminLayout>
        <slot name="header" />
        <h3>Roles and Permissions</h3>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <Link class="nav-link" :class="{ active: route().current('admin.role_permission.role.*') }"
                    :href="route('admin.role_permission.role.index')">Roles</Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :class="{ active: route().current('admin.role_permission.permission.*') }"
                    :href="route('admin.role_permission.permission.index')">Permissions</Link>
            </li>
        </ul>
        <div class="container mt-3">
            <slot />
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
import { computed } from 'vue';

</script>