<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
</script>
<template>
  <section id="about_section" class='relative flex flex-row items-center gap-32 h-screen align-center'>
    <div class="relative z-10 shrink-0 w-[40vw] h-[80%] my-auto">
      <img
          v-if="acf.about_image?.url"
          :src="acf.about_image.url"
          :alt="acf.about_image.alt || acf.about_title || 'about'"
          class="w-full h-full object-cover object-[center_20%] shadow-sm rounded-lg border-1 border-[var(--circle-secondary)]"
        />
    </div>
    <div class='flex flex-col'>
        <span v-if="acf.about_subtitle">{{ acf.about_subtitle }}</span>
        <h2 v-if="acf.about_title" v-html="acf.about_title"></h2>
        <p v-if="acf.about_description">{{ acf.about_description.split('.')[0] }}.<br/><br/>{{ acf.about_description.split('.')[1] || '' }}.</p>
    </div>
  </section>
</template>