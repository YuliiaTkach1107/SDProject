<script setup>
import { inject, computed } from "vue";
const wpData = inject("wpData");
const menus = computed(() => wpData.menus ?? {});
</script>
<template>
  <header>
    <!-- <h1>SD Theme Header</h1>
    <pre>{{ menus }}</pre>
    <nav>
      <ul>
        <li v-for="item in menus.main" :key="item.url">
          <a :href="item.url">
            {{ item.title }}
          </a>
        </li>
      </ul>
    </nav> -->
  </header>
</template>