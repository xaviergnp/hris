<template>
  <Head title="Job Vacancies" />
  
  <AdminLayout>
    <BreadCrumbs :crumbs="crumbs" />
    <h3>Job Applications</h3>
    <div class="d-flex justify-content-between align-items-center" />
    <div class="table-responsive mt-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Date Submitted</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in props.applications.data" :key="item.id">
            <td>{{ index + 1 }}</td>
            <td>{{ item.user.name }}</td>
            <td>{{ moment(item.created_at).format('MMM D, YYYY') }}</td>
            <td>
              <Link
                class="btn btn-dark"
                :href="route('admin.recruitment.job_application.show', {job_application: item.id})"
              >
                View
              </Link>
            </td>
          </tr>
        </tbody>
      </table>
      <div
        v-if="!props.applications.data.length"
        class="text-center text-secondary"
      >
        No records
      </div>
    </div>
    <Pagination
      v-if="props.applications.data.length"
      :links="props.applications.links"
    />
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
    label: 'Recruitment',
  },
  {
    label: 'Job Vacancies',
    link: route('admin.recruitment.job_posting.index'),
  },
  {
    label: props.posting.position,
    link: route('admin.recruitment.job_posting.show', {job_posting: props.posting.id}),
  },
  {
    label: 'Applications',
  },
])
  
const props = defineProps({
  posting: Object,
  applications: Object,
})
</script>
  