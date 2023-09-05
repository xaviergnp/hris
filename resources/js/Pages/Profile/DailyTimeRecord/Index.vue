<template>
  <ProfileLayout>
    <template #header>
      <h3>DTR</h3>
    </template>
    <div class="mb-3">
      <input id="" v-model="filter.month" type="month" name="" class="form-control" @change="onChangeMonth" />
    </div>
    <div class="table-responsive" :style="{position: 'relative'}">
      <div v-if="filter.processing" class="center-element">
        <div
          class="spinner-border text-primary spinner-border-lg"
          role="status"
        >
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
      
      

      <!-- Daily Time Record table -->
      <table class="w-100 text-center" :style="{opacity: filter.processing ? 0.2 : 1}">
        <thead>
          <tr>
            <td rowspan="2">#</td>
            <td rowspan="2">Day</td>
            <td colspan="2">Morning</td>
            <td colspan="2">Afternoon</td>
            <td rowspan="2">Total Hours</td>
          </tr>
          <tr>
            <td>In</td>
            <td>Out</td>
            <td>In</td>
            <td>Out</td>
          </tr>
        </thead>
        <tbody>
          <!-- Loop through days in the selected month -->
          <tr v-for="(record) in record_sample" :key="record.date">
            <td>{{ record.date }}</td>
            <td>{{ record.day }}</td>
            <td>
              {{ record.inAM }}
            </td>
            <td>
              {{ record.outAM }}
            </td>
            <td>
              {{ record.inPM }}
            </td>
            <td>
              {{ record.outPM }}
            </td>
            <td>
              {{ record.totalHours }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </ProfileLayout>
</template>

<script setup>
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { debounce } from 'lodash'
import moment from 'moment'


const props = defineProps({
  records: Array,
  record_sample: Array,
  filters: Object,
})

const filter = useForm({
  month: props.filters.month ?? moment().format('YYYY-MM'),
})

const onChangeMonth = debounce(() => {
  filter.get(route('daily_time_record.index'), {
    preserveState: true,
    preserveScroll: true,
  })
}, 1000)


</script>


<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}</style>