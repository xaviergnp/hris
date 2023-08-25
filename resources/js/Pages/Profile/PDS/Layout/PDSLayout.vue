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


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.educational_background.edit')" class="nav-link"
          :class="{ active: route().current('profile.pds.educational_background.edit') }"
        >
          Educational Background
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.civil_service_eligibility.index')" class="nav-link"
          :class="{ active: route().current('profile.pds.civil_service_eligibility.*') }"
        >
          Civil Service Eligibility
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.work_experience.index')" class="nav-link"
          :class="{ active: route().current('profile.pds.work_experience.*') }"
        >
          Work Experience
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.voluntary_work.index')" class="nav-link"
          :class="{ active: route().current('profile.pds.voluntary_work.*') }"
        >
          Voluntary Work
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.learning_and_development.index')" class="nav-link"
          :class="{ active: route().current('profile.pds.learning_and_development.*') }"
        >
          Learning and Development
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.other_information.index')" class="nav-link"
          :class="{ active: route().current('profile.pds.other_information.*') }"
        >
          Other Information
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.page_four_questions.edit')" class="nav-link"
          :class="{ active: route().current('profile.pds.page_four_questions.*') }"
        >
          Questions
        </Link>
      </li>


      <li class="nav-item">
        <Link
          preserve-state :href="route('profile.pds.reference_id.index')" class="nav-link"
          :class="{ active: route().current('profile.pds.reference_id.*') }"
        >
          References and ID
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
import { Link } from '@inertiajs/vue3'
</script>
