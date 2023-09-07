<template>
  <Head title="Job Vacancies" />
    
  <AdminLayout>
    <BreadCrumbs :crumbs="crumbs" />
    <h3>Employees</h3>
    <Link :href="route('admin.employees.create')">Create Account</Link>
  </AdminLayout>
</template>
    
<script setup>
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'
import moment from 'moment'
import Pagination from '@/Components/Pagination.vue'
import Filter from '@/Pages/Admin//Recruitment/JobPosting/Components/Filter.vue'
    
const crumbs = computed(() => [
  {
    label: 'Admin Dashboard',
    link: route('admin.dashboard'),
  },
  {
    label: 'Employees',
  },
])
    
</script>
    