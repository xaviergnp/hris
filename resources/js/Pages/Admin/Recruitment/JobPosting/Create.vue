<template>
    <Head title="Job Vacancies" />

    <AdminLayout>
        <BreadCrumbs :crumbs="crumbs" />
        <h3>Add Job Vacancy</h3>
        <hr />
        <form @submit.prevent="create">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="position" class="form-label"
                            >Position</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            v-model="form.position"
                            id="position"
                        />
                        <InputError :message="form.errors.position" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="place_of_assignment" class="form-label"
                            >Place of assignment</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            v-model="form.place_of_assignment"
                            id="place_of_assignment"
                        />
                        <InputError
                            :message="form.errors.place_of_assignment"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="salary_grade" class="form-label"
                            >Salary Grade</label
                        >
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.salary_grade"
                            id="salary_grade"
                        />
                        <InputError :message="form.errors.salary_grade" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="monthly_salary" class="form-label"
                            >Monthly Salary</label
                        >
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.monthly_salary"
                            id="monthly_salary"
                        />
                        <InputError :message="form.errors.monthly_salary" />
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="plantilla_item_no" class="form-label"
                    >Platilla Item No.</label
                >
                <input
                    type="text"
                    class="form-control"
                    v-model="form.plantilla_item_no"
                    id="plantilla_item_no"
                />
                <InputError :message="form.errors.plantilla_item_no" />
            </div>
            <div class="mb-3">
                <label for="eligibility" class="form-label">Eligibility</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="form.eligibility"
                    id="eligibility"
                />
                <InputError :message="form.errors.eligibility" />
            </div>
            <div class="mb-3">
                <label for="education" class="form-label">Education</label>
                <input
                    type="text"
                    class="form-control"
                    id="education"
                    v-model="form.education"
                />
                <InputError :message="form.errors.education" />
            </div>
            <div class="mb-3">
                <label for="training" class="form-label">Training</label>
                <input
                    type="text"
                    class="form-control"
                    id="training"
                    v-model="form.training"
                />
                <InputError :message="form.errors.training" />
            </div>
            <div class="mb-3">
                <label for="work_experience" class="form-label"
                    >Work Experience</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="work_experience"
                    v-model="form.work_experience"
                />
                <InputError :message="form.errors.work_experience" />
            </div>
            <div class="mb-3">
                <label for="competency" class="form-label">Competency</label>
                <textarea
                    type="text"
                    class="form-control"
                    rows="4"
                    v-model="form.competency"
                    style="white-space: pre-wrap"
                    id=" competency"
                ></textarea>
                <InputError :message="form.errors.competency" />
            </div>
            <div class="mb-3">
                <label for="posting_date" class="form-label"
                    >Posting Date</label
                >
                <input
                    type="date"
                    class="form-control"
                    v-model="form.posting_date"
                    id="posting_date"
                />
                <InputError :message="form.errors.posting_date" />
            </div>
            <div class="mb-3">
                <label for="closing_date" class="form-label"
                    >Closing Date</label
                >
                <input
                    type="date"
                    class="form-control"
                    v-model="form.closing_date"
                    id="closing_date"
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
                    Add record
                </button>
            </div>
        </form>
    </AdminLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue'
import InputError from '@/Components/InputError.vue'
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import { computed } from 'vue'

const form = useForm({
    place_of_assignment: null,
    position: null,
    salary_grade: null,
    monthly_salary: null,
    eligibility: null,
    education: null,
    training: null,
    work_experience: null,
    competency: null,
    posting_date: null,
    closing_date: null,
    plantilla_item_no: null
})

const create = () =>
    form.post(route('admin.recruitment.job_posting.store'), {
        onSuccess: () => {
            form.place_of_assignment = null
            form.position = null
            form.salary_grade = null
            form.monthly_salary = null
            form.eligibility = null
            form.education = null
            form.training = null
            form.work_experience = null
            form.competency = null
            form.posting_date = null
            form.closing_date = null
            form.plantilla_item_no = null
        }
    })

const crumbs = computed(() => [
    {
        label: 'Admin Dashboard',
        link: route('admin.dashboard')
    },
    {
        label: 'Recruitment'
    },
    {
        label: 'Job Vacancies',
        link: route('admin.recruitment.job_posting.index')
    },
    {
        label: 'Add'
    }
])
</script>
