<template>
  <ul v-if="lists.length" class="list-group list-group-flush list-group-numbered">
    <li v-for="(list, index) in lists" :key="index" class="list-group-item">{{ list }}</li>
  </ul>
</template>

<script setup>
defineProps({
  lists: Array,
})
</script>