<template>
  <div>
    <div class="container-fluid">
      <AdminMainNavbar />
      <!-- Page Heading -->
      <header v-if="$slots.header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" />
      </header>

      <!-- Page Content -->
      <main>
        <div class="container mt-3">
          <div
            v-if="$page.props.ziggy.flash.success"
            class="alert alert-success"
          >
            {{ $page.props.ziggy.flash.success }}
          </div>
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import AdminMainNavbar from '../Components/AdminMainNavbar.vue'

</script>
