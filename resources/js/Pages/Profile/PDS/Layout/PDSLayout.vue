<template>
  <div class="tabbable">
    <ul class="nav nav-tabs" style="display: flex" role="tablist">
      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.personal_information.edit')" class="nav-link"
          :class="{ active: route().current('profile.pds.personal_information.edit') }"
        >
          Personal Information
        </Link>
      </li>
      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.family_background.edit')" class="nav-link"
          :class="{ active: route().current('profile.pds.family_background.edit') }"
        >
          Family Background
        </Link>
      </li>
    </ul>
    <hr />
    <div id="pds" class="container">
      <slot />
    </div>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  pages: Array,
})

const pages = ref([
  {
    link: route('profile.pds.personal_information.edit'),
    label: 'Personal Information',
  },
  {
    // link: 'family',
    link: route('profile.pds.family_background.edit'),
    label: 'Family Background',
  },
  {
    // link: 'education',
    link: null,
    label: 'Educational Background',
  },
  {
    // link: 'eligibility',
    link: null,
    label: 'Civil Service Eligibility',
  },
  {
    // link: 'work_experience',
    link: null,
    label: 'Work Experience',
  },
  {
    // link: 'vouluntary_work',
    link: null,
    label: 'Voluntary Work or Involvement',
  },
  {
    // link: 'learning_development',
    link: null,
    label: 'Learning and Development',
  },
  {
    // link: 'other_information',
    link: null,
    label: 'Other Information',
  },
])
</script>
