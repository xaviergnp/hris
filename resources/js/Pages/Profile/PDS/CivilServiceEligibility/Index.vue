<template>
  <ProfileLayout>
    <PDSLayout>
      <Link :href="route('profile.pds.civil_service_eligibility.create')" class="btn btn-success">Add Eligibility</Link>

      
      <div class="table-responsive">
        <table class="table table-sm table-bordered mt-3">
          <thead>
            <tr>
              <th scope="col">CAREER SERVICE/RA1080</th>
              <th scope="col">RATING(If applicable)</th>
              <th scope="col">DATE OF EXAMINATION</th>
              <th scope="col">PLACE OF EXAMINATION</th>
              <th scope="col">LICENSE NUMBER</th>
              <th scope="col">DATE OF VALIDITY</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <tbody v-if="props.eligibilities.data.length" style="text-transform: uppercase;">
            <tr v-for="eligibility in props.eligibilities.data" :key="eligibility.id">
              <td scope="row">{{ eligibility.cs_board_bar_ces_csee_barangay_drivers }}</td>
              <td>{{ eligibility.rating }}</td>
              <td>{{ eligibility.date_of_exam_conferment }}</td>
              <td>{{ eligibility.place_of_exam_conferment }}</td>
              <td>{{ eligibility.license_number }}</td>
              <td>{{ eligibility.license_date_of_validity }}</td>
              <td>
                <div class="d-flex gap-2">
                  <Link
                    class="btn btn-primary btn-sm"
                    :href="route('profile.pds.civil_service_eligibility.edit', { civil_service_eligibility: eligibility.id })"
                    preserve-scroll
                  >
                    Edit
                  </Link>
                  <Link
                    as="button" class="btn btn-danger btn-sm" method="delete"
                    :href="route('profile.pds.civil_service_eligibility.destroy', { civil_service_eligibility: eligibility.id })"
                    preserve-scroll
                  >
                    Delete
                  </Link>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="!props.eligibilities.data.length" class="text-center">No records to display</div>
      </div>
      <div class="mb-3 d-flex justify-content-end gap-2">
        <Link
          :href="route('profile.pds.educational_background.edit')" type="button"
          class="btn btn-dark"
        >
          <i class="bi-arrow-left" />
        </Link>
        <Link
          :href="route('profile.pds.work_experience.index')" type="button"
          class="btn btn-dark"
        >
          <i class="bi-arrow-right" />
        </Link>
      </div>
      <Pagination
        v-if="props.eligibilities.data.length > 10"
        :links="props.eligibilities.links"
      />
    </PDSLayout>
  </ProfileLayout>
</template>

<script setup>
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue'
import PDSLayout from '@/Pages/Profile/PDS/Layout/PDSLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'
import Pagination from '@/Components/Pagination.vue'

const props = defineProps({
  eligibilities: Object,
})

</script>