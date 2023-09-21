<template>
  <Head title="Job Vacancies" />
      
  <AdminLayout>
    <BreadCrumbs :crumbs="crumbs" />
    <h3>Create Reward/Recognition</h3>
    
    <form @submit.prevent="onSubmit">
      <div class="mb-3">
        <label for="" class="form-label">Title</label>
        <input
          id=""
          v-model="form.title" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
        />
        <InputError :message="form.errors.title" />
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Points</label>
        <input
          id=""
          v-model="form.points" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
        />
        <InputError :message="form.errors.points" />
      </div>
    
      <div class="mb-3">
        <button
          :disabled="!form.isDirty &&
            form.wasSuccessful" type="submit" class="btn btn-primary btn-md"
        >
          <Spinner :processing="form.processing" /> {{ !form.isDirty &&
            form.wasSuccessful ? 'Updated' : 'Update Reward' }}
        </button>
      </div>
    </form>
  </AdminLayout>
</template>
      
<script setup>
import BreadCrumbs from '@/Components/BreadCrumbs.vue'
import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue'
import InputError from '@/Components/InputError.vue'
import Spinner from '@/Components/Spinner.vue'
import { Head, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'
  

const props = defineProps({
  reward: Object,
})

const form = useForm({
  title: props.reward.title,
  points: props.reward.points,
})

const crumbs = computed(() => [
  {
    label: 'Admin Dashboard',
    link: route('admin.dashboard'),
  },
  {
    label: 'Rewards and Recognition',
    link: route('admin.rewards.index'),
  },
  {
    label: 'Edit',
  },
])

const onSubmit = () => form.put(route('admin.rewards.update', {reward: props.reward.id}))
      
</script>
      