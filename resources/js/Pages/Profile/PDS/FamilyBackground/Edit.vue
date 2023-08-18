<template>
    <ProfileLayout>
        <template #header>
            <h3>Personal Data Sheet</h3>
        </template>

        <PDSLayout>
            <div class="row">
                <!-- SPOUSE -->

                <div class="col-12">
                    <h5>Spouse</h5>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_surname" />
                        <InputError :message="form.errors.spouse_surname" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_first_name" />
                        <InputError :message="form.errors.spouse_first_name" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_middle_name" />
                        <InputError :message="form.errors.spouse_middle_name" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Name Extension (JR.,SR.)</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_name_extension" />
                        <InputError :message="form.errors.spouse_name_extension" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Occupation</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_occupation" />
                        <InputError :message="form.errors.spouse_occupation" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Employer/Business Name</label>
                        <input type="text" class="form-control form-control-sm"
                            v-model="form.spouse_employer_business_name" />
                        <InputError :message="form.errors.spouse_employer_business_name" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Business Address</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_business_address" />
                        <InputError :message="form.errors.spouse_business_address" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Telephone No.</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.spouse_telephone_number" />
                        <InputError :message="form.errors.spouse_telephone_number" />
                    </div>
                </div>

                <!-- FATHER -->

                <div class="col-12">
                    <h5>Father</h5>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.fathers_surname" />
                        <InputError :message="form.errors.fathers_surname" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.fathers_first_name" />
                        <InputError :message="form.errors.fathers_first_name" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.fathers_middle_name" />
                        <InputError :message="form.errors.fathers_middle_name" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Name Extension (JR.,SR.)</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.fathers_name_extension" />
                        <InputError :message="form.errors.fathers_name_extension" />
                    </div>
                </div>

                <!-- MMOTHER -->

                <div class="col-12">
                    <h5>Mother</h5>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.mothers_surname" />
                        <InputError :message="form.errors.mothers_surname" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.mothers_first_name" />
                        <InputError :message="form.errors.mothers_first_name" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="form.mothers_middle_name" />
                        <InputError :message="form.errors.mothers_middle_name" />
                    </div>
                </div>

                <div class="col-12">
                    <h5>Name of Children</h5>
                    <div class="container border py-2 rounded">
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addChildren">Add
                            Child</button>
                        <table class="table table-striped" style="text-transform: uppercase;">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Date of Birth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="child in children">
                                    <td>{{ child.fullname }}</td>
                                    <td>{{ child.date_of_birth }}</td>
                                    <td>
                                        <Link :only="['children']" as="button" class="btn btn-danger btn-sm" method="delete"
                                            :href="route('profile.pds.children.delete', { children: child.id })"
                                            preserve-scroll>
                                        Delete</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex gap-2">
                            <div class="d-flex align-items-center">
                                <b class="text-danger form-status" v-if="form.isDirty">Not Saved</b>
                                <b class="text-success form-status" v-if="!form.isDirty && form.wasSuccessful">Saved</b>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <Spinner :processing="form.processing" /> Save
                            </button>
                            <Link :href="route('profile.pds.family_background.edit')" type="button" :disabled="form.isDirty"
                                class="btn btn-primary">
                            Next
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </PDSLayout>
    </ProfileLayout>
    <Modal id="addChildren">
        <template #header>
            <h5>Add child</h5>
        </template>
        <template #body>
            <div class="row">
                <div class="col-12">
                    <div v-if="childrenForm.recentlySuccessful" class="alert alert-success">Saved</div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control form-control-sm" v-model="childrenForm.fullname" />
                        <InputError :message="childrenForm.errors.fullname" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Date of birth</label>
                        <input type="date" class="form-control form-control-sm" v-model="childrenForm.date_of_birth" />
                        <InputError :message="childrenForm.errors.date_of_birth" />
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success d-block ms-auto" @click="addChild">Add</button>
                </div>
            </div>
        </template>
    </Modal>
</template>

<script setup>
import Spinner from '@/Components/Spinner.vue';
import { useForm, Link } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue';
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue';
import PDSLayout from '@/Pages/Profile/PDS/Layout/PDSLayout.vue';
import Modal from '@/Components/Modal.vue'

const props = defineProps({
    children: Array
})

const form = useForm({
    spouse_surname: null,
    spouse_first_name: null,
    spouse_name_extension: null,
    spouse_middle_name: null,
    spouse_occupation: null,
    spouse_employer_business_name: null,
    spouse_business_address: null,
    spouse_telephone_number: null,
    fathers_surname: null,
    fathers_first_name: null,
    fathers_name_extension: null,
    fathers_middle_name: null,
    mothers_maiden_name: null,
    mothers_surname: null,
    mothers_first_name: null,
    mothers_middle_name: null,
});

const childrenForm = useForm({
    fullname: null,
    date_of_birth: null
})

const addChild = () => childrenForm.post(route('profile.pds.family_background.store_child'), {
    preserveScroll: true,
    onSuccess: () => childrenForm.reset()
});


</script>