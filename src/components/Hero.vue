<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});

</script>
<template>
  <section id="hero_section" class='relative flex flex-row items-center gap-32 min-h-screen w-full align-center overflow-hidden'>
    <div class="absolute w-[clamp(140px,13vw,195px)] h-[clamp(140px,13vw,195px)] rounded-full bg-[var(--circle-primary)]/50 top-[8%] left-[6%] z-0"></div>
    <div class="absolute w-[clamp(220px,20vw,300px)] h-[clamp(220px,20vw,300px)] rounded-full bg-[var(--circle-secondary)]/60 -top-[8%] right-[-5%] z-0"></div>
    <div class="absolute w-[clamp(400px,36vw,550px)] h-[clamp(400px,36vw,550px)] rounded-full bg-[var(--circle-primary)]/50 top-[12%] right-[1%] z-0"></div>
    <div class="absolute w-[clamp(180px,18vw,270px)] h-[clamp(180px,18vw,270px)] rounded-full bg-[var(--circle-quaternary)] bottom-[12%] left-[3%] z-0 shadow-sm"></div>
    <div class="absolute w-[clamp(280px,27vw,410px)] h-[clamp(280px,27vw,410px)] rounded-full bg-[var(--circle-tertiary)]/40 bottom-[10%] left-[17%] z-0 shadow-sm"></div>
    <div class="relative z-10 shrink-0 w-[clamp(430px,40vw,600px)] h-[clamp(430px,40vw,600px)]">
      <img
          v-if="acf.hero_image?.url"
          :src="acf.hero_image.url"
          :alt="acf.hero_image.alt || acf.hero_title || 'hero'"
          class="w-full h-full object-cover object-center rounded-full shadow-sm"
        />
    </div>
    <div class='relative z-10 flex-1'>
      <span v-if="acf.hero_subtitle">{{ acf.hero_subtitle }}</span>
      <h1 v-if="acf.hero_title" v-html="acf.hero_title"></h1>
      <p v-if="acf.hero_description" class='w-100 mb-10'>{{ acf.hero_description }}</p>
      <div class="flex flex-row gap-10">
        <a v-if='acf.hero_primary_button_text' :href='acf.hero_primary_button_link || "#"' class="flex gap-2 items-center text-[var(--text-button-primary)] bg-[var(--bg-button-primary)]"> {{ acf.hero_primary_button_text }} <span class="material-symbols-outlined text-[var(--text-button-primary)]">arrow_forward</span></a>
        <a v-if='acf.hero_secondary_button_text' :href='acf.hero_secondary_button_link || "#"' class="flex items-center text-[var(--text-button-secondary)] bg-[var(--bg-button-secondary) border-1 border-[var(--text-button-secondary)]"> {{ acf.hero_secondary_button_text }} </a>
      </div>
    </div>
  </section>
</template>