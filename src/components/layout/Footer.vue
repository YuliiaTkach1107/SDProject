<script setup>
import { inject, computed } from "vue";
import ContactDetails from "../contacts/ContactDetails.vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
const menus = computed(() => wpData.menus ?? {});
const logo = computed(() => wpData.logo ?? {});
</script>
<template>
    <!-- <footer class="flex px-15 py-6 gap-50">
        <div class="flex flex-col gap-4">
            <a v-if="logo" :href="'/'" class="logo">
                <img :src="logo" alt="Logo" class="h-auto w-40 py-2" />
            </a>
            <p v-html="acf.footer_description"></p>
            <a v-if="acf.footer_button_text" :href="acf.footer_button_url || '#'" class="inline-block text-white bg-[var(--bg-button-primary)] w-fit"> {{ acf.footer_button_text }} </a>
        </div>
            <nav aria-label="Footer navigation">
                <ul class="flex flex-col text-[var(--text-primary)]">
                    <li v-for="(item, index) in menus.main" :key="item.url">
                        <a
                            v-if="item.title"
                            :href="item.url"
                            :class="['menu_link', { 'last_footer_menu_link': index === menus.main.length - 1 }]"
                        >
                            {{ item.title }}
                        </a>
                    </li>
                </ul>
            </nav>
            <ContactDetails />
    </footer> -->
</template>