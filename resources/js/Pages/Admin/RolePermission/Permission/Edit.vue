<template>
    <RolePermissionLayout>
        <template #header>
            <BreadCrumbs :crumbs="crumbs" />
        </template>
        <form @submit.prevent="update">
            <div class="form-group mb-3">
                <label for="" class="input-label">Permission name</label>
                <input type="text" name="" id="" class="form-control" v-model="form.permission_name">
                <InputError :message="form.errors.permission_name" />
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </RolePermissionLayout>
</template>

<script setup>
import RolePermissionLayout from '@/Pages/Admin/RolePermission/Layout/RolePermissionLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue'
import BreadCrumbs from '@/Components/BreadCrumbs.vue';
import { computed } from 'vue';

const crumbs = computed(() => ([
    {
        label: 'Admin Dashboard',
        link: route('admin.dashboard')
    },
    {
        label: 'Roles and Permission'
    },
    {
        label: 'Permissions',
        link: route('admin.role_permission.permission.index')
    },
    {
        label: props.permission.name,
    },
]))

const props = defineProps({
    permission: Object
});

const form = useForm({
    permission_name: props.permission.name,
})

// const togglePermission = (e) => {
//     if (e.target.checked) {
//         if (!form.permissions.includes(e.target.value)) {
//             form.permissions.push(e.target.value)
//         }
//     } else {
//         form.permissions = form.permissions.filter(perm => perm !== e.target.value)
//     }
// }

const update = () => form.put(route('admin.role_permission.permission.update', { permission: props.permission.id }));
</script>