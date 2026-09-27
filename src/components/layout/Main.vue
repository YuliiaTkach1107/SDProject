<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

</script>
<template>
  <div>
    <Header />
    <main>
      <slot />
    </main>
    <Footer />
  </div>
</template>