<template>
    <div>
        <div class="container-fluid">
            <MainNavbar />
            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="container mt-3">
                    <div class="alert alert-success" v-if="$page.props.ziggy.flash.success">
                        {{ $page.props.ziggy.flash.success }}
                    </div>
                </div>
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import MainNavbar from '@/Components/MainNavbar.vue';
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);
</script>