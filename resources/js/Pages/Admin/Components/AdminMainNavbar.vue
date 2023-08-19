<template>
  <nav class="navbar navbar-expand-sm bg-light shadow-sm navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">HRIS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" />
      </button>
      <div id="collapsibleNavbar" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <div class="nav-item">
            <Link
              class="nav-link" :href="route('admin.recruitment.job_posting.index')" :class="{
                active: route().current(
                  'admin.recruitment.job_posting.*'
                )
              }"
            >
              Recruitment, Selection and Placement
            </Link>
          </div>
          <div class="nav-item dropdown">
            <Link
              class="nav-link" :href="route('admin.role_permission.role.index')" :class="{
                active: route().current(
                  'admin.role_permission.*'
                )
              }"
            >
              Roles and Permissions
            </Link>
          </div>
        </ul>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{
            $page.props.auth.user.name }}</a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" :href="route('profile.index')">Profile</a>
            </li>
            <li>
              <Link class="dropdown-item" :href="route('dashboard')">Main</Link>
            </li>
            <li>
              <Link class="dropdown-item" :href="route('logout')" method="post" as="button">Logout</Link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
