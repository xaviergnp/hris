<template>
  <Head title="Application" />
  <AuthenticatedLayout>
    <BreadCrumbs :crumbs="crumbs" />
    <div class="progress">
      <div
        class="progress-bar" role="progressbar" :style="{width: percent}" aria-valuenow="33.33" aria-valuemin="0"
        aria-valuemax="100"
      />
    </div>
    <div class="d-flex justify-content-around align-items-center mb-2">
      <h6>Fill-up/Update PDS</h6>
      <h6>Upload Attachments</h6>
      <h6>Review Application</h6>
    </div>
    <div class="container rounded p-4" style="background: #ebebeb">
      <slot />
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'

const props = defineProps({
  job_posting: Object,
  percent: String,
})

const crumbs = computed(() => [
  {
    label: 'Dashboard',
    link: route('dashboard'),
  },
  {
    label: 'Job Vacancies',
    link: route('recruitment.job_posting.index'),
  },
  {
    label: props.job_posting.plantilla_item_no,
    link: route('recruitment.job_posting.show', {
      job_posting: props.job_posting.id,
    }),
  },
  {
    label: 'Application',
  },
])
</script>
