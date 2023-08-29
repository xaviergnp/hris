<template>
  <ApplicationLayout :job_posting="job_posting" percent="33.33%">
    <div>
      <a :href="route('profile.pds.personal_information.edit')" target="_blank">
        Review/Update Personal Data Sheet
      </a>
    </div>

    <div class="d-flex justify-content-between">
      <Link :href="route('recruitment.job_posting.show', {job_posting: job_posting.id})" class="btn btn-dark">Back</Link>
      <Link :href="route('job_application.apply.create_attachments', {job_posting: job_posting.id})" class="btn btn-success">Next</Link>
    </div>
  </ApplicationLayout>
</template>
  
<script setup>
import { Link } from '@inertiajs/vue3'
import ApplicationLayout from '@/Pages/JobApplication/Layout/ApplicationLayout.vue'
  
const props = defineProps({
  job_posting: Object,
  personal_information: Object,
})
  
</script>
  