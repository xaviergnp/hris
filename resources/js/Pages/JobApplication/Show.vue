<template>
    <Head title="Application" />
    <AuthenticatedLayout>
        <BreadCrumbs :crumbs="crumbs" />
        <div class="progress">
            <div
                class="progress-bar"
                role="progressbar"
                style="width: 33.33%"
                aria-valuenow="33.33"
                aria-valuemin="0"
                aria-valuemax="100"
            ></div>
        </div>
        <div class="d-flex justify-content-around align-items-center mb-2">
            <h6>Fill-up/Update PDS</h6>
            <h6>Upload Attachments</h6>
            <h6>Review</h6>
        </div>
        <div class="container bg-light w-100 shadow" style="height: 80vh">
            <div class="container py-2 rounded" style="background: #ebebeb">
                <PDS />
            </div>
            <div class="d-flex justify-content-end mt-2">
                <button class="btn btn-primary">Next</button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import PDS from '@/Pages/PDS/Index.vue'

const props = defineProps({
    job_posting: Object
})

const crumbs = computed(() => [
    {
        label: 'Dashboard',
        link: route('dashboard')
    },
    {
        label: 'Job Vacancies',
        link: route('recruitment.job_posting.index')
    },
    {
        label: props.job_posting.plantilla_item_no,
        link: route('recruitment.job_posting.show', {
            job_posting: props.job_posting.id
        })
    },
    {
        label: 'Application'
    }
])
</script>
