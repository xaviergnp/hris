<template>
  <ProfileLayout>
    <PDSLayout>
      <form class="row" @submit.prevent="save">
        <div class="col-12">
          <h6>References</h6>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
              id=""
              v-model="form.references_name_one" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_name_one" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <input
              id=""
              v-model="form.references_address_one" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_address_one" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Telephone No.</label>
            <input
              id=""
              v-model="form.references_telephone_one" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_telephone_one" />
          </div>
        </div>

        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
              id=""
              v-model="form.references_name_two" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_name_two" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <input
              id=""
              v-model="form.references_address_two" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_address_two" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Telephone No.</label>
            <input
              id=""
              v-model="form.references_telephone_two" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_telephone_two" />
          </div>
        </div>


        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
              id=""
              v-model="form.references_name_three" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_name_three" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <input
              id=""
              v-model="form.references_address_three" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_address_three" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Telephone No.</label>
            <input
              id=""
              v-model="form.references_telephone_three" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.references_telephone_three" />
          </div>
        </div>

        <div class="col-12">
          <h6>Government Issued ID</h6>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Government Issued ID</label>
            <input
              id=""
              v-model="form.government_issued_id" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.government_issued_id" />
            <p class="form-text text-muted">
              (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)
            </p>
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">ID/License/Passport No.</label>
            <input
              id=""
              v-model="form.id_license_passport_number" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.id_license_passport_number" />
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="" class="form-label">Date/Place of Issuance</label>
            <input
              id=""
              v-model="form.date_place_of_issuance" type="text" class="form-control" name="" aria-describedby="helpId" placeholder=""
            />
            <InputError :message="form.errors.date_place_of_issuance" />
          </div>
        </div>


        <div class="d-flex gap-2">
          <div class="d-flex align-items-center">
            <b v-if="form.isDirty" class="text-danger form-status">Not Saved</b>
          </div>
          <Link :href="route('profile.pds.reference_id.index')" class="btn btn-secondary">Back</Link>
          <button
            type="submit" :disabled="!form.isDirty && form.wasSuccessful"
            class="btn btn-success"
          >
            <Spinner :processing="form.processing" /> {{ !form.isDirty &&
              form.wasSuccessful ? 'Saved' : 'Save' }}
          </button>
        </div>
      </form>
    </PDSLayout>
  </ProfileLayout>
</template>

<script setup>
import Spinner from '@/Components/Spinner.vue'
import { useForm, Link } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue'
import PDSLayout from '@/Pages/Profile/PDS/Layout/PDSLayout.vue'

const props = defineProps({
  references_and_id: Object,
})

const form = useForm({
  references_name_one: props.references_and_id?.references_name_one,
  references_address_one: props.references_and_id?.references_address_one,
  references_telephone_one: props.references_and_id?.references_telephone_one,
  references_name_two: props.references_and_id?.references_name_two,
  references_address_two: props.references_and_id?.references_address_two,
  references_telephone_two: props.references_and_id?.references_telephone_two,
  references_name_three: props.references_and_id?.references_name_three,
  references_address_three: props.references_and_id?.references_address_three,
  references_telephone_three: props.references_and_id?.references_telephone_three,
  government_issued_id: props.references_and_id?.government_issued_id,
  id_license_passport_number: props.references_and_id?.id_license_passport_number,
  date_place_of_issuance: props.references_and_id?.date_place_of_issuance,
  co_government_issued_id: props.references_and_id?.co_government_issued_id,
  co_id_license_passport_number: props.references_and_id?.co_id_license_passport_number,
  co_date_place_of_issuance: props.references_and_id?.co_date_place_of_issuance,
  photo: props.references_and_id?.photo,
})

const save = () => {
  form.post(route('profile.pds.reference_id.store_or_update'), {
    preserveScroll: true,
  })
}
</script>