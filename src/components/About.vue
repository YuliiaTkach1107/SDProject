<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
</script>
<template>
  <section id="about_section" aria-labelledby="about-title" class='relative flex flex-col-reverse gap-6 md:flex-row items-center md:gap-10 lg:gap-32 py-10 lg:py-15 align-center'>
    <div class="pointer-events-none absolute right-4 top-15 z-0 hidden lg:block lg:w-[15%]">
      <img src="../assets/Svitlana_Darmostuk.svg" alt="" loading="lazy" class="w-full rotate-20" aria-hidden="true" />
    </div>
    <div class="relative z-10 shrink-0 w-[40vw] h-[80%] md:w-[30vw] md:h-[70%] my-auto rounded-t-full rounded-b-lg overflow-hidden">
      <img
          v-if="acf.about_image?.url"
          :src="acf.about_image.url"
          :alt="acf.about_image.alt || acf.about_title || 'about'"
          loading="lazy"
          class="w-full h-full object-cover object-[center_20%] shadow-sm rounded-t-full rounded-b-lg border-1 border-[var(--circle-secondary)]"
        />
    </div>
    <div class='flex flex-col'>
        <span v-if="acf.about_subtitle">{{ acf.about_subtitle }}</span>
        <h2 id="about-title" v-if="acf.about_title" v-html="acf.about_title"></h2>
        <p v-if="acf.about_description">{{ acf.about_description.split('.')[0] }}.<br/><br/>{{ acf.about_description.split('.')[1] || '' }}.</p>
    </div>
  </section>
</template>