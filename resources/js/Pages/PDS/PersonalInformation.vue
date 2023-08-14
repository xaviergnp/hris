<template>
    <div class="row">
        <!-- PERSONAL INFORMATION -->
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control form-control-sm" id="surname" v-model="form.surname" />
                <InputError :message="form.errors.surname" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control form-control-sm" id="first_name" v-model="form.first_name" />
                <InputError :message="form.errors.first_name" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="middle_name" v-model="form.middle_name" />
                <InputError :message="form.errors.middle_name" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="name_extension" class="form-label">Name Extension</label>
                <input type="text" class="form-control form-control-sm" id="name_extension" v-model="form.name_extension" />
                <InputError :message="form.errors.name_extension" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control form-control-sm" id="date_of_birth" v-model="form.date_of_birth" />
                <InputError :message="form.errors.date_of_birth" />
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Place of Birth</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth" v-model="form.place_of_birth" />
                <InputError :message="form.errors.place_of_birth" />
            </div>
        </div>

        <!-- GENDER -->

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="male" name="sex" value="male" v-model="form.sex" />
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="female" name="sex" value="female" v-model="form.sex" />
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <InputError :message="form.errors.sex" />
            </div>
        </div>

        <!-- CIVIL STATUS -->
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="sex" class="form-label">Civil Status</label>
                <div class="d-flex gap-2">
                    <div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="single" v-model="form.civil_status"
                                name="civil_status" value="single" />
                            <label class="form-check-label" for="single">Single</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="married" v-model="form.civil_status"
                                name="civil_status" value="married" />
                            <label class="form-check-label" for="married">Married</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="widowed" v-model="form.civil_status"
                                name="civil_status" value="widowed" />
                            <label class="form-check-label" for="widowed">Widowed</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="separated" v-model="form.civil_status"
                                name="civil_status" value="separated" />
                            <label class="form-check-label" for="separated">Separated</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="others" v-model="form.civil_status"
                                name="civil_status" value="others" />
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                        <div class="form-group">
                            <input type="text" v-if="form.civil_status === 'others'" placeholder="Type here"
                                :required="form.civil_status" class="form-control form-control-sm" id="others"
                                name="civil_status" v-model="form.other_civil_status" />
                        </div>
                    </div>
                </div>
                <InputError />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="height" class="form-label">Height</label>
                <input type="number" class="form-control form-control-sm" id="height" v-model="form.height" />
                <InputError :message="form.errors.height" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="number" class="form-control form-control-sm" id="weight" v-model="form.weight" />
                <InputError :message="form.errors.weight" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="blood_type" class="form-label">Blood Type</label>
                <input type="text" class="form-control form-control-sm" v-model="form.blood_type" />
                <InputError :message="form.errors.blood_type" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="gsis_id_number" class="form-label">GSIS No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.gsis_id_number" />
                <InputError :message="form.errors.gsis_id_number" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label class="form-label">PAGIBIG No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.pagibig_id_number" />
                <InputError :message="form.errors.pagibig_id_number" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label class="form-label">Philhealth No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.philhealth_number" />
                <InputError :message="form.errors.philhealth_number" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label class="form-label">SSS No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.sss_number" />
                <InputError :message="form.errors.sss_number" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label class="form-label">TIN No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.tin_number" />
                <InputError :message="form.errors.tin_number" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label class="form-label">Agency Employee No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.agency_employee_number" />
                <InputError :message="form.errors.agency_employee_number" />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="filipino" v-model="form.filipino" name="filipino" />
                    <label class="form-check-label" for="filipino">Filipino</label>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dual_citizenship" v-model="form.dual_citizenship"
                    name="dual_citizenship" />
                <label class="form-check-label" for="dual_citizenship">Dual Citizenship</label>
            </div>
        </div>

        <div class="col-12 col-md-2" v-if="form.dual_citizenship">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="by_birth" v-model="form.by_birth" />
                <label class="form-check-label" for="by_birth">by birth</label>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="by_naturalization" v-model="form.by_naturalization" />
                <label class="form-check-label" for="by_naturalization">by naturalization</label>
            </div>
        </div>

        <div class="col-12 col-md-2" v-if="form.dual_citizenship &&
            (form.by_birth || form.by_naturalization)
            ">
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select type="text" class="form-control form-control-sm" id="country" v-model="form.country">
                    <option value="">Select Country</option>
                    <option v-for="country in countries" :value="country.name">
                        {{ country.name }}
                    </option>
                </select>
                <InputError :message="form.errors.country" />
            </div>
        </div>

        <!-- RESIDENTIAL ADDRESS -->

        <div class="col-12">
            <h5>Residential Address</h5>
        </div>

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">House/Block/Lot No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_house_block_lot_number" />
                <InputError :message="form.errors.r_address_house_block_lot_number" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Street</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_street" />
                <InputError :message="form.errors.r_address_street" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Subdivision/Village</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_subdivision_village" />
                <InputError :message="form.errors.r_address_subdivision_village" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Barangay</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_barangay" />
                <InputError :message="form.errors.r_address_barangay" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">City/Municipality</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_city_municipality" />
                <InputError :model="form.errors.r_address_city_municipality" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Province</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_province" />
                <InputError :message="form.errors.r_address_province" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Zipcode</label>
                <input type="text" class="form-control form-control-sm" v-model="form.r_address_zipcode" />
                <InputError :message="form.errors.r_address_zipcode" />
            </div>
        </div>

        <!-- PERMANENT ADDRESS -->

        <div class="col-12">
            <div class="d-flex gap-3">
                <h5>Permanent Address</h5>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" v-model="form.same_address" id="same_address"
                        name="same_address" />
                    <label class="form-check-label" for="same_address">Same as residential address.</label>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">House/Block/Lot No.</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_house_block_lot_number" />
                <InputError :message="form.errors.r_address_house_block_lot_number" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Street</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_street" />
                <InputError :message="form.errors.r_address_street" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Subdivision/Village</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_subdivision_village" />
                <InputError :message="form.errors.r_address_subdivision_village" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Barangay</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_barangay" />
                <InputError :message="form.errors.r_address_barangay" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">City/Municipality</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_city_municipality" />
                <InputError :model="form.errors.r_address_city_municipality" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Province</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_province" />
                <InputError :message="form.errors.r_address_province" />
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Zipcode</label>
                <input type="text" :disabled="form.same_address" class="form-control form-control-sm"
                    v-model="form.p_address_zipcode" />
                <InputError :message="form.errors.r_address_zipcode" />
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-12">
            <h5>Contact Information</h5>
        </div>

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Telephone No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.telephone_number" />
                <InputError :message="form.errors.telephone_number" />
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Mobile No.</label>
                <input type="text" class="form-control form-control-sm" v-model="form.mobile_number" />
                <InputError :message="form.errors.mobile_number" />
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control form-control-sm" v-model="form.email_address" />
                <InputError :message="form.errors.email_address" />
            </div>
        </div>
    </div>
</template>

<script setup>
import nationalities from '@/json/Nationality.json'
import countries from '@/json/countries.json'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    surname: null,
    first_name: null,
    middle_name: null,
    name_extension: null,
    date_of_birth: null,
    place_of_birth: null,
    sex: null,
    height: null,
    weight: null,
    blood_type: null,
    gsis_id_number: null,
    pagibig_id_number: null,
    philhealth_number: null,
    tin_number: null,
    agency_employee_number: null,
    r_address_house_block_lot_number: null,
    r_address_street: null,
    r_address_subdivision_village: null,
    r_address_barangay: null,
    r_address_city_municipality: null,
    r_address_zipcode: null,

    p_address_house_block_lot_number: null,
    p_address_street: null,
    p_address_subdivision_village: null,
    p_address_barangay: null,
    p_address_city_municipality: null,
    p_address_zipcode: null,

    telephone_number: null,
    mobile_number: null,
    email_address: null,

    duplicate_address: false,
    civil_status: null,
    other_civil_status: null,
    dual_citizenship: false,
    filipino: false,
    by_birth: false,
    by_naturalization: false,
    country: null,
    same_address: false
})
</script>
