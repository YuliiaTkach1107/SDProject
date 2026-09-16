<script setup>
import { inject, computed } from "vue";
import ContactForm from "./forms/ContactForm.vue";
import ContactDetails from "./contacts/ContactDetails.vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
</script>
<template>
    <section id="contact_section" class="bg-[var(--bg-secondary)] py-15 grid grid-cols-2 gap-10">
        <div>
            <span v-if="acf.contact_subtitle">{{ acf.contact_subtitle }}</span>
            <h2 v-if="acf.contact_title" v-html="acf.contact_title"></h2>
            <p v-if="acf.contact_description" class="mb-4">{{ acf.contact_description }}</p>
            <ContactDetails />
        </div>
        <div>
            <ContactForm />
        </div>
    </section>
</template>