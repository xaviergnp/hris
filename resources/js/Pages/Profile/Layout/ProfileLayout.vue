<template>
  <Head title="Profile" />
  <AuthenticatedLayout>
    <div class="row">
      <div class="col-2">
        <ul class="nav flex-column nav-pills">
          <li class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current('profile.index')
              }" :href="route('profile.index')"
            >
              Profile
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current('profile.pds.*')
              }" :href="route('profile.pds.personal_information.edit')"
            >
              Personal
              Data Sheet
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current('job_application.index')
              }" :href="route('job_application.index')"
            >
              My Job Applications
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current('daily_time_record.index')
              }" :href="route('daily_time_record.index')"
            >
              Daily Time Record
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current(
                  'profile.edit'
                )
              }" :href="route('profile.edit')"
            >
              Settings
            </Link>
          </li>
        </ul>
      </div>
      <div class="col-10">
        <slot name="header" />
        <slot />
      </div>
    </div>
  </AuthenticatedLayout>
</template>


<script setup>
import { Head, Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
</script>
