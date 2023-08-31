<template>
  <div>
    <div class="container-fluid">
      <MainNavbar />
      <!-- Page Heading -->
      <header v-if="$slots.header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" />
      </header>

      <!-- Page Content -->
      <main>
        <div class="container mt-3">
          <Notifications :flash="$page.props.ziggy.flash" />
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import MainNavbar from '@/Components/MainNavbar.vue'
import Notifications from '@/Components/Notifications.vue'

</script>
