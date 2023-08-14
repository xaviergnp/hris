<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    links: Array
})
</script>

<template>
    <ul class="pagination">
        <li
            v-for="(link, index) in links"
            :key="index"
            class="page-item"
            :class="{ active: link.active }"
        >
            <Link
                preserve-scroll
                :href="link.url ? link.url : '#'"
                class="page-link"
                v-html="link.label"
            />
        </li>
    </ul>
</template>
