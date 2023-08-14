<template>
    <RolePermissionLayout>
        <template #header>
            <BreadCrumbs :crumbs="crumbs" />
        </template>
        <form @submit.prevent="update">
            <div class="form-group mb-3">
                <label for="" class="input-label">Role name</label>
                <input
                    type="text"
                    name=""
                    id=""
                    class="form-control"
                    v-model="form.role_name"
                />
                <InputError :message="form.errors.role_name" />
            </div>
            <h4>Permissions</h4>
            <div class="mb-3">
                <div
                    v-for="permission in props.all_permissions"
                    class="form-check"
                >
                    <input
                        class="form-check-input"
                        type="checkbox"
                        :value="permission.name"
                        :id="`permissionId${permission.id}`"
                        @change="togglePermission"
                        :checked="form.permissions?.includes(permission.name)"
                    />
                    <label
                        class="form-check-label"
                        :for="`permissionId${permission.id}`"
                    >
                        {{ permission.name }}
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </RolePermissionLayout>
</template>

<script setup>
import RolePermissionLayout from '@/Pages/Admin/RolePermission/Layout/RolePermissionLayout.vue'
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import { computed } from 'vue'

const crumbs = computed(() => [
    {
        label: 'Admin Dashboard',
        link: route('admin.dashboard')
    },
    {
        label: 'Roles and Permission'
    },
    {
        label: 'Roles',
        link: route('admin.role_permission.role.index')
    },
    {
        label: props.role.name
    }
])

const props = defineProps({
    role: Object,
    all_permissions: Array
})

const form = useForm({
    role_name: props.role.name,
    permissions: props.role.permissions.map((perm) => perm.name)
})

const togglePermission = (e) => {
    if (e.target.checked) {
        if (!form.permissions.includes(e.target.value)) {
            form.permissions.push(e.target.value)
        }
    } else {
        form.permissions = form.permissions.filter(
            (perm) => perm !== e.target.value
        )
    }
}

const update = () =>
    form.put(
        route('admin.role_permission.role.update', { role: props.role.id })
    )
</script>
