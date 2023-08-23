<template>
  <ProfileLayout>
    <template #header><h3>Personal Data Sheet</h3></template>
    <PDSLayout>
      <div class="table-responsive">
        <table class="table table-sm mt-3">
          <thead>
            <tr>
              <th scope="col">SPECIAL SKILLS and HOBBIES</th>
              <th scope="col">NON-ACADEMIC DISTINCTIONS / RECOGNITION</th>
              <th scope="col">MEMBERSHIP IN ASSOCIATION/ORGANIZATION</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="p-2"><BulletedList :lists="skills" /></td>
              <td class="p-2"><BulletedList :lists="none_academic_distinctions" /></td>
              <td class="p-2"><BulletedList :lists="membership_in_assoc_org" /></td>
            </tr>
          </tbody>
        </table>
      </div>

      <Link class="btn btn-success" :href="route('profile.pds.other_information.edit')">Edit</Link>
    </PDSLayout>
  </ProfileLayout>
</template>
    
<script setup>
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue'
import PDSLayout from '@/Pages/Profile/PDS/Layout/PDSLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'
import BulletedList from '@/Components/BulletedList.vue'
import { computed } from 'vue'
    
const props = defineProps({
  other_information: Object,
})
    
const skills = computed(() => {
  return props.other_information.special_skills_hobbies ? props.other_information.special_skills_hobbies.split(',') : []
})

const none_academic_distinctions = computed(() => {
  return props.other_information.none_academic_distinctions ? props.other_information.none_academic_distinctions.split(',') : []
})

const membership_in_assoc_org = computed(() => {
  return props.other_information.membership_in_assoc_org ? props.other_information.membership_in_assoc_org.split(',') : []
})
</script>