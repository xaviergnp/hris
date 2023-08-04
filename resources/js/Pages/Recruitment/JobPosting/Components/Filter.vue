<template>
    <form @submit.prevent="filter">

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="search" class="col-form-label">Search</label>
            </div>
            <div class="col-auto">
                <input type="text" id="search" class="form-control" v-model="filterForm.search">
            </div>
            <div class="col-auto">
                <label for="search" class="col-form-label">Sort By</label>
            </div>
            <div class="col-auto">
                <div class="input-group flex-nowrap">
                    <select name="" id="" class="form-control" v-model="filterForm.order_by">
                        <option value="posting_date">Posting Date</option>
                        <option value="closing_date">Closing Date</option>
                    </select>
                    <select name="" id="" class="form-control" v-model="filterForm.order">
                        <option value="desc">Latest</option>
                        <option value="asc">Oldest</option>
                    </select>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-dark btn-sm">Filter</button>
            </div>
            <div class="col-auto">
                <button @click="resetFilter" type="reset" class="btn btn-secondary btn-sm">Reset</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    filters: Object
});

const filterForm = useForm({
    search: props.filters.search,
    order_by: props.filters.order_by ?? 'posting_date',
    order: props.filters.order ?? 'desc'
})

const filter = () => filterForm.get(route('recruitment.job_posting.index', {
    preserveState: true,
    preserveScroll: true
}))
const resetFilter = () => {
    filterForm.search = null;
    filterForm.order_by = 'posting_date';
    filterForm.order = 'desc'
    filter()
}
</script>