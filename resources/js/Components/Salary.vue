<template>
    <span>{{ computedPrice }}</span>
</template>
  
<script setup>
import { computed } from 'vue'
const props = defineProps({
    value: [Number, String],
})
const computedPrice = computed(() => Number(props.value).toLocaleString('en-US', {
    style: 'currency',
    currency: 'PHP',
    minimumFractionDigits: 0,
}))
</script>