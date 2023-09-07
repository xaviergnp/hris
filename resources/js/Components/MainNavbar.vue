<template>
  <nav class="navbar navbar-expand-sm bg-light shadow-sm navbar-light">
    <div class="container-fluid">
      <Link class="navbar-brand" :href="route('dashboard')">HRIS</Link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" />
      </button>
      <div id="collapsibleNavbar" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <!-- <li class="nav-item">
                        <Link class="nav-link" :class="{ active: route().current('dashboard') }" :href="route('dashboard')">
                        Dashboard</Link>
                    </li> -->
          <li class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current(
                  'recruitment.job_posting.*'
                )
              }" :href="route('recruitment.job_posting.index')"
            >
              Job Vacancies
            </Link>
          </li>
          <li v-if="user" class="nav-item">
            <Link
              class="nav-link" :class="{
                active: route().current(
                  'daily_time_record.*'
                )
              }" :href="route('daily_time_record.index')"
            >
              Daily Time Record
            </Link>
          </li>
          <!-- <div class="nav-item dropdown">
                        <Link class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            :class="{ active: route().current('recruitment.*') }">Job Vacancies
                        </Link>
                        <ul class="dropdown-menu">
                            <li>
                                <Link class="dropdown-item" :href="route('recruitment.job_posting.index')">Job Vacancies
                                </Link>
                            </li>
                        </ul>
                    </div> -->
        </ul>

        <div v-if="user" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{
            $page.props.auth.user?.name }}</a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <Link class="dropdown-item" :href="route('profile.index')">Profile</Link>
            </li>
            <li v-if="admin">
              <Link class="dropdown-item" :href="route('admin.dashboard')">Admin</Link>
            </li>
            <li>
              <Link class="dropdown-item" :href="route('logout')" method="post" as="button">Logout</Link>
            </li>
          </ul>
        </div>

        <div v-else class="nav-item d-flex gap-2">
          <Link :href="route('login')" class="btn btn-dark">Sign-In</Link>
          <Link :href="route('register')" class="btn btn-secondary">Register</Link>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'

import { computed } from 'vue'

const user = computed(() => usePage().props.auth.user)
const admin = computed(() => {
  const isAdmin = usePage()
    .props.auth.permissions?.map((perm) => perm.name)
    .includes('Access Admin')
  return isAdmin
})

</script>
