<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Register" />

    <div class="container center-element">
      <div class="card shadow w-25">
        <div class="card-body">
          <form @submit.prevent="submit">
            <div>
              <InputLabel for="name" value="Name" />

              <TextInput
                id="name"
                v-model="form.name"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="name"
              />

              <InputError
                class="mt-2"
                :message="form.errors.name"
              />
            </div>

            <div class="mt-4">
              <InputLabel for="email" value="Email" />

              <TextInput
                id="email"
                v-model="form.email"
                type="email"
                class="mt-1 block w-full"
                required
                autocomplete="username"
              />

              <InputError
                class="mt-2"
                :message="form.errors.email"
              />
            </div>

            <div class="mt-4">
              <InputLabel for="password" value="Password" />

              <TextInput
                id="password"
                v-model="form.password"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="new-password"
              />

              <InputError
                class="mt-2"
                :message="form.errors.password"
              />
            </div>

            <div class="mt-4">
              <InputLabel
                for="password_confirmation"
                value="Confirm Password"
              />

              <TextInput
                id="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="new-password"
              />

              <InputError
                class="mt-2"
                :message="form.errors.password_confirmation"
              />
            </div>

            <div
              class="d-flex align-items-center justify-content-end mt-4 gap-3"
            >
              <Link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Already registered?
              </Link>

              <PrimaryButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Register
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
