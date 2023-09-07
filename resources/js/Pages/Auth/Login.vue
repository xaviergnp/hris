<script setup>
import Checkbox from '@/Components/Checkbox.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
})

const form = useForm({
  username: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Log in" />

    <div class="container">
      <div class="card shadow center-element">
        <div class="card-body">
          <div
            v-if="status"
            class="mb-4 font-medium text-sm text-green-600"
          >
            {{ status }}
          </div>
          <form @submit.prevent="submit">
            <div>
              <InputLabel for="username" value="Username" />

              <TextInput
                id="username"
                v-model="form.username"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="username"
              />

              <InputError
                class="mt-2"
                :message="form.errors.username"
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
                autocomplete="current-password"
              />

              <InputError
                class="mt-2"
                :message="form.errors.password"
              />
            </div>

            <div class="block mt-4">
              <label class="d-flex align-items-center gap-1">
                <Checkbox
                  v-model:checked="form.remember"
                  name="remember"
                />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
              </label>
            </div>

            <div
              class="d-flex align-items-center justify-content-end mt-4 gap-3"
            >
              <!-- <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Forgot your password?
              </Link> -->

              <PrimaryButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Log in
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
