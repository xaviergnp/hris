<template>
  <ApplicationLayout :job_posting="job_posting" percent="66.66%">
    <div class="mb-3">
      <label for="" class="form-label">Fully accomplished Personal Data Sheet (PDS)</label>
      <input id="" type="file" class="form-control" name="" placeholder="" aria-describedby="fileHelpId" />
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Performance rating in the last rating period (if applicable)
      </label>
      <input id="" type="file" class="form-control" name="" placeholder="" aria-describedby="fileHelpId" />
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Photocopy of certificate of eligibility/rating/license</label>
      <input id="" type="file" class="form-control" name="" placeholder="" aria-describedby="fileHelpId" />
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Photocopy of Transcript of Records</label>
      <input id="" type="file" class="form-control" name="" placeholder="" aria-describedby="fileHelpId" />
    </div>
    <div class="d-flex justify-content-between">
      <Link :href="route('job_application.apply.update_pds', {job_posting: job_posting.id})" class="btn btn-dark">Back</Link>
      <Link :href="route('job_application.apply.review_application', {job_posting: job_posting.id})" class="btn btn-success">Next</Link>
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
      