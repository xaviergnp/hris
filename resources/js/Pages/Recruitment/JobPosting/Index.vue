<template>
    <Head title="Job Opportunities" />

    <AuthenticatedLayout>
        <div class="container py-2">
            <BreadCrumbs :crumbs="crumbs" class="mb-3" />
            <h3>Job Vacancies</h3>
            <div class="d-flex justify-content-between align-items-center">
                <form @submit.prevent="filter" class="d-flex gap-2">
                    <input type="text" name="" id="" class="form-control" placeholder="Search" v-model="filterForm.search">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
                <div>
                    <Link :href="route('recruitment.job_posting.create')" class="btn btn-primary">Add Item</Link>
                </div>
            </div>
            <div class="table-responsive">
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
                        <tr v-for="item in props.job_vacancies.data" :key="item.id">
                            <td>{{ item.place_of_assignment }}</td>
                            <td>{{ item.position }}</td>
                            <td>{{ item.plantilla_item_no }}</td>
                            <td>{{ moment(item.posting_date).format('LL') }}</td>
                            <td>{{ moment(item.closing_date).format('LL') }}</td>
                            <td>
                                <Link :href="route('recruitment.job_posting.show', { job_posting: item.id })"
                                    class="btn btn-dark">Show</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center text-secondary" v-if="!props.job_vacancies.data.length">No records</div>
            </div>
            <Pagination v-if="props.job_vacancies.data.length" :links="props.job_vacancies.links" />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import BreadCrumbs from '@/Components/BreadCrumbs.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
import moment from 'moment'
import Pagination from '@/Components/Pagination.vue';

const crumbs = computed(() => ([
    {
        label: 'Dashboard',
        link: route('dashboard')
    },
    {
        label: 'Recruitment'
    },
    {
        label: 'Job Vacancies',
    }
]))

const props = defineProps({
    job_vacancies: Array,
    filters: Object
});

const filterForm = useForm({
    search: props.filters.search
})

const filter = () => filterForm.get(route('recruitment.job_posting.index', {
    preserveState: true,
    preserveScroll: true
}))

</script>