<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});

const groupedServices = computed(() => {
    const result = {};

    acf.value.services_data?.forEach(detail => {
        if (!result[detail.title]) {
            result[detail.title] = [];
        }

        result[detail.title].push(detail);
    });

    return result;
});
</script>
<template>
    <section id="services_section" class="relative py-15 min-h-screen align-center bg-[var(--bg-primary)]/30">
        <div class="flex flex-col">
            <span v-if="acf.services_subtitle">{{ acf.services_subtitle }}</span>
            <h2 v-if="acf.services_title" class="text-[var(--text-primary)]"> {{ acf.services_title }}</h2>
            <div class="flex flex-col gap-4 w-[90%] m-auto mt-5">
                <div v-for="(details, title) in groupedServices" :key="title" class="border border-[var(--border-primary)] rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                    <table class="w-full">
                        <tbody>
                        <!-- If a single service has no subtitle -->
                            <tr v-if="details.length === 1 && !details[0].subtitle">
                                <td class="flex-1">
                                    <h3>{{ title }}</h3>
                                    <p v-if="details[0].duration">{{ details[0].duration }}</p>
                                    <p v-if="details[0].description">{{ details[0].description }}</p>
                                </td>

                                <td class="text-center w-50">
                                    <p v-if="details[0].price">{{ details[0].price }}</p>
                                    <p v-if="details[0].price_note">{{ details[0].price_note }}</p>
                                </td>

                                <td class="text-center w-60">
                                    <a v-if="details[0].button_text" :href="details[0].booking_url || '#'" class="inline-block text-white bg-[var(--bg-button-primary)]"> {{ details[0].button_text }} </a>
                                </td>
                            </tr>

                        <!--If there are subtitles -->
                            <template v-else>
                                <tr>
                                    <td colspan="3" class="pb-3">
                                        <h3>{{ title }}</h3>
                                    </td>
                                </tr>

                                <tr v-for="(detail, index) in details" :key="detail.id" :class="index > 0 ? 'border-t border-gray-100' : ''">
                                    <td :class="index > 0 ? 'pt-3' : '' + ' flex-1'">
                                        <h4 v-if="detail.subtitle">{{ detail.subtitle }}</h4>
                                        <p v-if="detail.duration">{{ detail.duration }}</p>
                                        <p v-if="detail.description">{{ detail.description }}</p>
                                    </td>

                                    <td class="text-center w-50" :class="index > 0 ? 'pt-3' : ''">
                                        <p v-if="detail.price">{{ detail.price }}</p>
                                        <p v-if="detail.price_note">{{ detail.price_note }}</p>
                                    </td>

                                    <td class="text-center w-60" :class="index > 0 ? 'pt-3' : ''">
                                        <a v-if="detail.button_text" :href="detail.booking_url || '#'" class="inline-block text-white bg-[var(--bg-button-primary)]"> {{ detail.button_text }} </a>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>