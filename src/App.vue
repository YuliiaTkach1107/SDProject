<script setup>
import { inject } from "vue";
import "./style.css";
import Main from "./components/layout/Main.vue";
import Hero from "./components/Hero.vue";

const wpData = inject("wpData");
</script>

<template>
  <Main>
    <div>
      <Hero />
    </div>
  </Main>
</template>