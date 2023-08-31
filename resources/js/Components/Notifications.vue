<template>
  <div v-if="flash.success" class="alert alert-success">
    {{ flash.success }}
  </div>
  <div v-if="flash.warning" class="alert alert-warning">
    {{ flash.warning }}
  </div>
</template>

<script setup>
defineProps({
  flash: Object,
})
</script>