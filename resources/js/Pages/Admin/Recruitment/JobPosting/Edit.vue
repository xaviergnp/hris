<template>
  <Head title="Edit Job Vacancy" />

  <AdminLayout>
    <BreadCrumbs :crumbs="crumbs" />
    <h3>Update Job Vacancy</h3>
    <hr />
    <form @submit.prevent="update">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input
              id="position"
              v-model="form.position"
              type="text"
              class="form-control"
            />
            <InputError :message="form.errors.position" />
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="mb-3">
            <label for="place_of_assignment" class="form-label">Place of assignment</label>
            <input
              id="place_of_assignment"
              v-model="form.place_of_assignment"
              type="text"
              class="form-control"
            />
            <InputError
              :message="form.errors.place_of_assignment"
            />
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="mb-3">
            <label for="salary_grade" class="form-label">Salary Grade</label>
            <input
              id="salary_grade"
              v-model="form.salary_grade"
              type="number"
              class="form-control"
            />
            <InputError :message="form.errors.salary_grade" />
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="mb-3">
            <label for="monthly_salary" class="form-label">Monthly Salary</label>
            <input
              id="monthly_salary"
              v-model="form.monthly_salary"
              type="number"
              class="form-control"
            />
            <InputError :message="form.errors.monthly_salary" />
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="plantilla_item_no" class="form-label">Platilla Item No.</label>
        <input
          id="plantilla_item_no"
          v-model="form.plantilla_item_no"
          type="text"
          class="form-control"
        />
        <InputError :message="form.errors.plantilla_item_no" />
      </div>
      <div class="mb-3">
        <label for="eligibility" class="form-label">Eligibility</label>
        <input
          id="eligibility"
          v-model="form.eligibility"
          type="text"
          class="form-control"
        />
        <InputError :message="form.errors.eligibility" />
      </div>
      <div class="mb-3">
        <label for="education" class="form-label">Education</label>
        <input
          id="education"
          v-model="form.education"
          type="text"
          class="form-control"
        />
        <InputError :message="form.errors.education" />
      </div>
      <div class="mb-3">
        <label for="training" class="form-label">Training</label>
        <input
          id="training"
          v-model="form.training"
          type="text"
          class="form-control"
        />
        <InputError :message="form.errors.training" />
      </div>
      <div class="mb-3">
        <label for="work_experience" class="form-label">Work Experience</label>
        <input
          id="work_experience"
          v-model="form.work_experience"
          type="text"
          class="form-control"
        />
        <InputError :message="form.errors.work_experience" />
      </div>
      <div class="mb-3">
        <label for="competency" class="form-label">Competency</label>
        <textarea
          id=" competency"
          v-model="form.competency"
          type="text"
          class="form-control"
          rows="4"
          style="white-space: pre-wrap"
        />
        <InputError :message="form.errors.competency" />
      </div>
      <div class="mb-3">
        <label for="posting_date" class="form-label">Posting Date</label>
        <input
          id="posting_date"
          v-model="form.posting_date"
          type="date"
          class="form-control"
        />
        <InputError :message="form.errors.posting_date" />
      </div>
      <div class="mb-3">
        <label for="closing_date" class="form-label">Closing Date</label>
        <input
          id="closing_date"
          v-model="form.closing_date"
          type="date"
          class="form-control"
        />
        <InputError :message="form.errors.closing_date" />
      </div>

      <div class="mb-3">
        <button class="btn btn-primary" :disabled="form.processing">
          <div
            v-if="form.processing"
            class="spinner-border spinner-border-sm"
            role="status"
          >
            <span class="visually-hidden">Loading...</span>
          </div>
          Update record
        </button>
      </div>
    </form>
  </AdminLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import { computed } from 'vue'
import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue'

const props = defineProps({
  job_posting: Object,
})

const form = useForm({
  place_of_assignment: props.job_posting.place_of_assignment,
  position: props.job_posting.position,
  salary_grade: props.job_posting.salary_grade,
  monthly_salary: props.job_posting.monthly_salary,
  eligibility: props.job_posting.eligibility,
  education: props.job_posting.education,
  training: props.job_posting.training,
  work_experience: props.job_posting.work_experience,
  competency: props.job_posting.competency,
  posting_date: props.job_posting.posting_date,
  closing_date: props.job_posting.closing_date,
  plantilla_item_no: props.job_posting.plantilla_item_no,
})

const update = () =>
  form.put(
    route('admin.recruitment.job_posting.update', {
      job_posting: props.job_posting.id,
    }),
  )

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
    label: props.job_posting.plantilla_item_no,
    link: route('admin.recruitment.job_posting.show', {
      job_posting: props.job_posting.id,
    }),
  },
  {
    label: 'Edit',
  },
])
</script>
