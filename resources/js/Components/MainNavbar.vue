<template>
    <nav class="navbar navbar-expand-sm bg-light shadow-sm navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HRIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: route().current('dashboard') }"
                            :href="route('dashboard')">Dashboard</a>
                    </li>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Recruitment</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" :href="route('recruitment.job_posting.index')">Job Vacancies</a></li>
                        </ul>
                    </div>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Link</a></li>
                            <li><a class="dropdown-item" href="#">Another link</a></li>
                            <li><a class="dropdown-item" href="#">A third link</a></li>
                        </ul>
                    </li> -->
                </ul>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{
                        $page.props.auth.user.name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end ">
                        <li><a class="dropdown-item" :href="route('profile.edit')">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Admin</a></li>
                        <li>
                            <Link class="dropdown-item" :href="route('logout')" method='post' as="button">Logout</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</nav></template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>