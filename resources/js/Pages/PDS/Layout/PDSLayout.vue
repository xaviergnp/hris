<template>
    <h3>Personal Data Sheet</h3>
    <div class="tabbable">
        <ul class="nav nav-pills" style="display: flex" role="tablist">
            <li class="nav-item" v-for="page in pages">
                <a
                    @click="onChangeNav"
                    href="#"
                    class="nav-link"
                    :data-show-nav="page.id"
                    :class="{ active: page.active }"
                    >{{ page.label }}</a
                >
            </li>
        </ul>
        <hr />
        <div class="container" id="pds">
            <slot />
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    pages: Array
})

const emit = defineEmits(['change-nav'])

const onChangeNav = (e) => {
    const page_id = e.target.getAttribute('data-show-nav')
    emit('change-nav', page_id)
}
</script>
