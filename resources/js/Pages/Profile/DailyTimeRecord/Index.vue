<template>
  <ProfileLayout>
    <template #header>
      <h3>DTR</h3>
    </template>
    <div class="table-responsive">
      <table class="table table-compact table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Timestamp</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="rec in records" :key="rec.id" class="">
            <td scope="row">{{ rec.date_time }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </ProfileLayout>
</template>
  
<script setup>
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue'
import { Link } from '@inertiajs/vue3'
const props = defineProps({
  records: Array,
})
</script>