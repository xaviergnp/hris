<template>
    <Head title="DTR"/>
    <AuthenticatedLayout>
        <h3>Daily Time Record</h3>

        <!-- Work From Home attendance -->
        <hr />
        <h5>Work From Home</h5>
        <table class="table table-bordered text-center">
          <thead>
            <tr>
                <th>Time In</th>
                <th >Break Out</th>
                <th>Break In</th>
                <th>Time Out</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>
                    <button type="button" class="btn btn-success" disabled>
                        Done
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-primary">
                        Current
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-secondary" disabled>
                        Pending
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-secondary" disabled>
                        Pending
                    </button>
                </td>
            </tr>
          </tbody>
        </table>
        <hr />


        <div class="mb-3">
            <input
                id=""
                v-model="filter.month"
                type="month"
                name=""
                class="form-control"
                @change="onChangeMonth"
            />
        </div>
        <div
            class="table-responsive container"
            :style="{ position: 'relative' }"
        >
            <div v-if="props.suggestions" class="mb-3">
                <b
                    >Today, you are expected to have rendered at least
                    <span class="text-danger"
                        >{{ props.suggestions.hours_to_render }} hours</span
                    >.
                </b>
                <b
                    >The suggested time to logout is
                    <span class="text-danger">{{
                        props.suggestions.timeout
                    }}</span></b
                >
            </div>
            <div v-if="filter.processing" class="center-element">
                <div
                    class="spinner-border text-primary spinner-border-lg"
                    role="status"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <!-- Daily Time Record table -->
            <table
                class="w-100 text-center dtr-table"
                :style="{ opacity: filter.processing ? 0.2 : 1 }"
            >
                <thead>
                    <tr>
                        <td rowspan="2" class="wd-10">#</td>
                        <td rowspan="2" class="wd-10">Day</td>
                        <td colspan="2">Morning</td>
                        <td colspan="2">Afternoon</td>
                        <td rowspan="2" class="wd-15">Total Hours</td>
                        <td rowspan="2">Remarks</td>
                    </tr>
                    <tr class="in-out">
                        <td>In</td>
                        <td>Out</td>
                        <td>In</td>
                        <td>Out</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through days in the selected month -->
                    <tr v-for="record in records" :key="record.date">
                        <td>{{ record.date }}</td>
                        <td>{{ record.day }}</td>
                        <td>
                            <b>{{ record.inAM }}</b>
                        </td>
                        <td>
                            <b>{{ record.outAM }}</b>
                        </td>
                        <td>
                            <b>{{ record.inPM }}</b>
                        </td>
                        <td>
                            <b>{{ record.outPM }}</b>
                        </td>
                        <td>
                            <b>{{ record.totalHours }}</b>
                        </td>
                        <td>
                            <b>{{ record.remarks }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { debounce } from "lodash";
import moment from "moment";

// const incrementAttendance({

// });

const props = defineProps({
    records: Array,
    filters: Object,
    suggestions: Object,
});

const filter = useForm({
    month: props.filters.month ?? moment().format("YYYY-MM"),
});

const onChangeMonth = debounce(() => {
    filter.get(route("daily_time_record.index"), {
        preserveState: true,
        preserveScroll: true,
    });
}, 1500);
</script>

<style>
.dtr-table,
.dtr-table th,
.dtr-table td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
