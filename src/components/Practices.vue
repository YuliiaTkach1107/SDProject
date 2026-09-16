<script setup>
import { inject, computed } from "vue";
import PracticeCard from "./cards/PracticeCard.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});

</script>
<template>
  <section id="practices_section" class="py-15">
    <span v-if="acf.practices_subtitle">{{ acf.practices_subtitle }}</span>
    <h2 v-if="acf.practices_title" v-html="acf.practices_title"></h2>
    <Swiper
        class="mySwiper"
        :modules="[Pagination]"
        :space-between="16"
        :slides-per-view="1"
        :breakpoints="{
          768: { slidesPerView: 2 },
          1200: { slidesPerView: 4 }
        }"
        :pagination="{ clickable: true }"
      >
        <SwiperSlide v-for="(card, index) in acf.practices_cards" :key="card.id" class="mb-2">
          <PracticeCard :card="card" :index="index" />
        </SwiperSlide>
      </Swiper>
      <div class="flex flex-row gap-20 mt-10 justify-center mb-20">
        <a v-if='acf.practices_primary_button_text' :href='acf.practices_primary_button_link || "#"' class="flex gap-2 items-center text-[var(--text-button-primary)] bg-[var(--bg-button-primary)]"> {{ acf.practices_primary_button_text }} <span class="material-symbols-outlined text-[var(--text-button-primary)]">arrow_forward</span></a>
        <a v-if='acf.practices_secondary_button_text' :href='acf.practices_secondary_button_link || "#"' class="flex items-center text-[var(--text-button-secondary)] bg-[var(--bg-button-secondary) border-1 border-[var(--text-button-secondary)]"> {{ acf.practices_secondary_button_text }} </a>
      </div>
      <div 
        class="banner"
        :style="acf.practices_banner?.background_image
          ? {
              backgroundImage: `url(${acf.practices_banner.background_image.url || acf.practices_banner.background_image})`,
            }
          : undefined">
        <h3 v-if="acf.practices_banner.title">{{ acf.practices_banner.title }}</h3>
        <p v-if="acf.practices_banner.description" class="mb-4">{{ acf.practices_banner.description }}</p>
        <a v-if="acf.practices_banner.button_text" :href="acf.practices_banner.button_url || '#'" class="inline-block text-[var(--text-button-secondary)] bg-white"> {{ acf.practices_banner.button_text }} </a>
      </div>

  </section>
</template>