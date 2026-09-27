<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
</script>
<template>
  <section id="about_section" class='relative flex flex-row items-center gap-32 py-15 align-center'>
     <div class="absolute w-50 right-10 top-15 ">
        <img src="../assets/Svitlana_Darmostuk.svg" alt="" class="rotate-20">
        <!-- <hr class="w-20 border-0 h-px rounded-full bg-[var(--bg-button-primary)] mt-10 ml-2"> -->
    </div>
    <div class="relative z-10 shrink-0 w-[30vw] h-[70%] my-auto rounded-t-full rounded-b-lg overflow-hidden">
      <img
          v-if="acf.about_image?.url"
          :src="acf.about_image.url"
          :alt="acf.about_image.alt || acf.about_title || 'about'"
          class="w-full h-full object-cover object-[center_20%] shadow-sm rounded-t-full rounded-b-lg border-1 border-[var(--circle-secondary)]"
        />
    </div>
    <div class='flex flex-col'>
        <span v-if="acf.about_subtitle">{{ acf.about_subtitle }}</span>
        <h2 v-if="acf.about_title" v-html="acf.about_title"></h2>
        <p v-if="acf.about_description">{{ acf.about_description.split('.')[0] }}.<br/><br/>{{ acf.about_description.split('.')[1] || '' }}.</p>
    </div>
  </section>
  <!-- <section class="flex flex-row gap-24 py-15">
    <div class="relative w-[100%] h-[100%] ">
        <img src="../assets/Svitlana_Darmostuk.svg" alt="" class="w-100 -rotate-20">
        <hr class="w-20 border-0 h-px rounded-full bg-[var(--bg-button-primary)] mt-10 ml-2">
    </div>
    <div class="relative z-10 shrink-0 w-[30vw] h-[70%] my-auto rounded-t-full rounded-b-lg overflow-hidden">
      <img
          v-if="acf.about_image?.url"
          :src="acf.about_image.url"
          :alt="acf.about_image.alt || acf.about_title || 'about'"
          class="w-full h-full object-cover object-[center_20%] shadow-sm rounded-t-full rounded-b-lg border-1 border-[var(--circle-secondary)]"
        />
    </div>
    <div class='flex flex-col'>
        <span v-if="acf.about_subtitle">{{ acf.about_subtitle }}</span>
        <h2 v-if="acf.about_title" v-html="acf.about_title"></h2>
        <p v-if="acf.about_description">{{ acf.about_description.split('.')[0] }}.<br/><br/>{{ acf.about_description.split('.')[1] || '' }}.</p>
    </div>
  </section> -->
</template>
<style scoped>

</style>