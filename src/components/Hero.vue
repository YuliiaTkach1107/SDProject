<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});
</script>
<template>
  <section>
    <div v-for="item in acf.hero" :key="item.id">
      <h1>{{ item.hero_title }}</h1>
      <h2>{{ item.hero_subtitle }}</h2>
    </div>
  </section>
</template>