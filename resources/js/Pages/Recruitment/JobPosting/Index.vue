<template>
    <Head title="Job Opportunities" />

    <AuthenticatedLayout>
        <div class="container py-4">
            <h3>Job Vacancies</h3>
            <div class="d-flex justify-content-between">
                <div class="d-flex gap-2">
                    <input type="text" name="" id="" class="form-control" placeholder="Search">
                    <button class="btn btn-secondary">Search</button>
                </div>
                <Link :href="route('recruitment.job_posting.create')" class="btn btn-primary">Add Item</Link>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Place of Assignment</th>
                        <th>Position Title</th>
                        <th>Plantilla Item No.</th>
                        <th>Posting Date</th>
                        <th>Closing Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Information and Communications Technology Unit</td>
                        <td>Information Systems Analyst 1</td>
                        <td>123ABC</td>
                        <td>August 2, 2023</td>
                        <td>August 20, 2023</td>
                        <td>
                            <button class="btn btn-dark">Show</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


</script>