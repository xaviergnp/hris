<template>
    <div
        v-if="processing"
        class="spinner-border spinner-border-sm"
        role="status"
    >
        <span class="visually-hidden">Loading...</span>
    </div>
</template>

<script setup>
defineProps({
    processing: Boolean
})
</script>
