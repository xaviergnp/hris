<template>
  <div v-if="lists.length" class="d-flex gap-2 flex-wrap">
    <span v-for="(list, index) in lists" :key="index" class="badge bg-dark">{{ list }}</span>
  </div>
</template>
  
<script setup>
defineProps({
  lists: Array,
})
</script>