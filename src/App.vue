<script setup>
import { inject } from "vue";
import "./style.css";
import Main from "./components/layout/Main.vue";
import Hero from "./components/Hero.vue";
import About from "./components/About.vue";
import Services from "./components/Services.vue";
import Practices from "./components/Practices.vue";
import Contact from "./components/Contact.vue";

const wpData = inject("wpData");
</script>

<template>
  <Main>
    <div>
      <Hero />
      <About />
      <Services />
      <Practices />
      <Contact />
    </div>
  </Main>
</template>