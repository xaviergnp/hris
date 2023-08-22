<template>
  <ProfileLayout>
    <template #header>
      <h3>Personal Data Sheet</h3>
    </template>

    <PDSLayout>
      <div class="row">
        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">FROM</label>
            <input
              id=""
              type="date" class="form-control form-control-sm" name="" placeholder=""
            />
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">TO</label>
            <input
              id=""
              type="date" class="form-control form-control-sm" name="" placeholder=""
            />
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">POSITION TITLE</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" name="" placeholder=""
            />
            <p class="form-text text-muted">
              Write in full/Do not abbreviate
            </p>
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">DEPARTMENT / AGENCY / OFFICE / COMPANY</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" name="" placeholder=""
            />
            <p class="form-text text-muted">
              Write in full/Do not abbreviate
            </p>
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">NAME OF OFFICE/UNIT</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" name="" placeholder=""
            />
            <p class="form-text text-muted">
              Write in full/Do not abbreviate
            </p>
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">OFFICE ADDRESS</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" name="" placeholder=""
            />
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">IMMEDIATE SUPERVISOR</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" name="" placeholder=""
            />
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">MONTHLY SALARY</label>
            <input
              id=""
              type="number" class="form-control form-control-sm" step="any" name="" placeholder=""
            />
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">SALARY/ JOB/ PAY GRADE</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" step="any" name="" placeholder=""
            />
            <p class="form-text text-muted">
              (if applicable)& STEP  (Format "00-0")/ INCREMENT
            </p>
          </div>
        </div>

        
        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">SALARY/ JOB/ PAY GRADE</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" step="any" name="" placeholder=""
            />
            <p class="form-text text-muted">
              (if applicable)& STEP  (Format "00-0")/ INCREMENT
            </p>
          </div>
        </div>


        <div class="form-group col-6">
          <div class="mb-3">
            <label for="" class="form-label">STATUS OF APPOINTMENT</label>
            <input
              id=""
              type="text" class="form-control form-control-sm" step="any" name="" placeholder=""
            />
          </div>
        </div>


        <div class="form-group col-6">
          <label for="" class="form-label">GOVERNMENT SERVICE</label>
          <div class="mb-3">
            <div class="form-check form-check-inline">
              <input id="govt_yes" class="form-check-input" type="radio" name="govt_service" value="{3:option1}" />
              <label class="form-check-label" for="govt_yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="govt_no" class="form-check-input" type="radio" name="govt_service" value="option2" />
              <label class="form-check-label" for="govt_no">No</label>
            </div>
          </div>
        </div>


        <div class="form-group col-12">
          <div class="mb-3">
            <label for="" class="form-label">LIST OF ACCOMPLISHMENTS</label>
            <textarea id="" class="form-control" name="" rows="3" />
            <p class="form-text text-muted">
              Start with a hyphen on each new item
            </p>
          </div>
        </div>
        <div class="form-group col-12">
          <div class="mb-3">
            <label for="" class="form-label">SUMMARY OF DUTIES</label>
            <textarea id="" class="form-control" name="" rows="3" />
            <p class="form-text text-muted">
              Start with a hyphen on each new item
            </p>
          </div>
        </div>
      </div>
    </PDSLayout>
  </ProfileLayout>
</template>

<script setup>
import Spinner from '@/Components/Spinner.vue'
import countries from '@/json/countries.json'
import { useForm, Link } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import ProfileLayout from '@/Pages/Profile/Layout/ProfileLayout.vue'
import PDSLayout from '@/Pages/Profile/PDS/Layout/PDSLayout.vue'
</script>