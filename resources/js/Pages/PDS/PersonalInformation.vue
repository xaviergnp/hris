<template>
    <div class="row">


        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control form-control-sm" id="surname">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control form-control-sm" id="first_name">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="name_extension" class="form-label">Name Extension</label>
                <input type="text" class="form-control form-control-sm" id="name_extension">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="middle_name">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control form-control-sm" id="date_of_birth">
                <InputError />
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Place of Birth</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-1">
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="male" name="sex" value="male" checked>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="female" name="sex" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-3">
            <div class="mb-3">
                <label for="sex" class="form-label">Civil Status</label>
                <div class="d-flex gap-2">
                    <div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="single" name="civil_status" value="single"
                                checked>
                            <label class="form-check-label" for="single">Single</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="married" name="civil_status" value="married">
                            <label class="form-check-label" for="married">Married</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="widowed" name="civil_status" value="widowed"
                                checked>
                            <label class="form-check-label" for="widowed">Widowed</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="separated" name="civil_status"
                                value="separated">
                            <label class="form-check-label" for="separated">Separated</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="others" name="civil_status" value="others"
                                checked>
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="others" name="civil_status">
                        </div>
                    </div>
                </div>
                <InputError />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="d-flex justify-content-between">
                <div>
                    <label for="height" class="form-label">Height</label>
                    <input type="number" class="form-control form-control-sm" id="height">
                    <InputError />
                </div>
                <div>
                    <label for="weight" class="form-label">Weight</label>
                    <input type="number" class="form-control form-control-sm" id="weight">
                    <InputError />
                </div>
            </div>
        </div>


        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Blood Type</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">GSIS No.</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">PAGIBIG No.</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Philhealth No.</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">SSS No.</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">TIN No.</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>


        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Agency Employee No.</label>
                <input type="text" class="form-control form-control-sm" id="place_of_birth">
                <InputError />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="citizenship" class="form-label">Citizenship</label>
                <select type="text" class="form-control form-control-sm" id="citizenship">
                    <option value="">Select one</option>
                    <option v-for="nationality in nationalities" :value="nationality">{{ nationality }}</option>
                </select>
                <InputError />
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select type="text" class="form-control form-control-sm" id="country">
                    <option value="">If Dual Citizenship</option>
                    <option v-for="country in countries" :value="country.name">{{ country.name }}</option>
                </select>
                <InputError />
            </div>
        </div>






    </div>
</template>

<script setup>
import nationalities from '@/json/Nationality.json'
import countries from '@/json/countries.json'
</script>