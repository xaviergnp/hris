<template>
    <PDSLayout :pages="pages" @change-nav="(page_id) => changeNav(page_id)">
        <PersonalInformation v-if="activePage === 'personal'" />
    </PDSLayout>
</template>

<script setup>
import PersonalInformation from './PersonalInformation.vue'
import FamilyBackground from './FamilyBackground.vue'
import PDSLayout from './Layout/PDSLayout.vue'
import { computed } from 'vue'
import { ref } from 'vue'

const pages = ref([
    {
        id: 'personal',
        label: 'Personal Information',
        active: true
    },
    {
        id: 'family',
        label: 'Family Background',
        active: false
    },
    {
        id: 'education',
        label: 'Educational Background',
        active: false
    },
    {
        id: 'eligibility',
        label: 'Civil Service Eligibility',
        active: false
    },
    {
        id: 'work_experience',
        label: 'Work Experience',
        active: false
    },
    {
        id: 'vouluntary_worjk',
        label: 'Voluntary Work or Involvement',
        active: false
    },
    {
        id: 'learning_development',
        label: 'Learning and Development',
        active: false
    },
    {
        id: 'other_information',
        label: 'Other Information',
        active: false
    }
])

const activePage = computed(() => {
    const page = pages.value.filter((page) => page.active)

    return page[0].id
})

const changeNav = (page_id) => {
    pages.value = pages.value.map((page) => {
        if (page.id === page_id) {
            return {
                id: page.id,
                label: page.label,
                active: true
            }
        } else {
            return {
                id: page.id,
                label: page.label,
                active: false
            }
        }
    })
}
</script>
