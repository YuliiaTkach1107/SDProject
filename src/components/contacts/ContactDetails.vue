<script setup>
import { inject, computed } from "vue";
const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
</script>
<template>
    <ul>
        <li class="contact_details flex flex-row gap-2 items-center mb-4" v-for="item in acf.contact_data" :key="item.id">
            <span v-if="item.icon?.type === 'dashicons' && item.icon.value" class="dashicons" :class="item.icon.value" aria-hidden="true"></span>
            <p v-if="item.contact_details">{{ item.contact_details }}</p>
        </li>
    </ul>
</template>
