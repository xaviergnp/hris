<template>
  <div>
    <MainNavbar />
    <!-- Page Content -->
    <div class="row">
      <div class="col-2 side-nav-col">
        <SideNav />
      </div>
      <div class="col">
        <div class="container">
          <br />
          <br />
          <br />
          <Notifications :flash="$page.props.ziggy.flash" />
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import MainNavbar from '@/Components/MainNavbar.vue'
import Notifications from '@/Components/Notifications.vue'
import SideNav from '@/Components/SideNav.vue'

</script>
