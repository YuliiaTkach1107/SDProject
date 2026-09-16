<script setup>
import { inject, computed } from "vue";
const wpData = inject("wpData");
const menus = computed(() => wpData.menus ?? {});
const logo = computed(() => wpData.logo ?? {});
</script>
<template>
  <header>
    <nav class="flex bg-[var(--bg-menu)] border-b border-[var(--text-primary)] fixed w-full z-50 text-[var(--text-primary)] px-15">
      <a v-if="logo" :href="'/'" class="logo">
        <img :src="logo" alt="Logo" class="h-auto w-40 py-2" />
      </a>
      <ul class="flex w-full items-center justify-end gap-8 text-[var(--text-primary)]">
        <li v-for="(item, index) in menus.main" :key="item.url">
          <a
            v-if="item.title"
            :href="item.url"
            :class="['menu_link', { 'last_menu_link': index === menus.main.length - 1 }]"
          >
            {{ item.title }}
          </a>
        </li>
      </ul>
    </nav> 
  </header> 
</template>