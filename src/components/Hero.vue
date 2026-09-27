<script setup>
import { inject, computed } from "vue";

const wpData = inject("wpData");
const acf = computed(() => wpData.acf ?? {});

</script>
<template>
  <!-- <section id="hero_section" class='relative flex flex-row items-center gap-32 min-h-screen w-full align-center overflow-hidden'>
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
        <a href='#' class="flex gap-2 items-center text-[var(--text-button-primary)] bg-[var(--bg-button-primary)] rounded-full"> Записатись онлайн <span class="material-symbols-outlined text-[var(--text-button-primary)]">arrow_forward</span></a>
        <a href='#' class="flex items-center text-[var(--text-button-secondary)] bg-[var(--bg-button-secondary) border-1 border-[var(--text-button-secondary)]">Дивитись більше</a>
      </div>
    </div> 
  </section> -->
  <section id="hero_section" class='relative lg:grid grid-cols-[40%_60%] items-center min-h-[700px] h-screen w-full align-center overflow-hidden !px-0 bg-[var(--bg-menu)]'>
    <div class='relative z-30 flex-1 pl-6 lg:pl-20 pt-24'>
      <span v-if="acf.hero_subtitle">{{ acf.hero_subtitle }}</span>
      <h1 v-if="acf.hero_title" v-html="acf.hero_title"></h1>
      <p v-if="acf.hero_description" class='w-[90%] lg:w-100 mb-10'>{{ acf.hero_description }}</p>
      <div class="flex flex-col lg:flex-row gap-10 w-[120%]">
        <a href='#' class="flex gap-2 items-center text-[var(--text-button-primary)] bg-[var(--bg-button-primary)] rounded-full"> Записатись на консультацію <span class="material-symbols-outlined text-[var(--text-button-primary)]">arrow_forward</span></a>
        <a href='#' class="flex items-center text-[var(--text-button-secondary)] bg-[var(--bg-button-secondary) border-1 border-[var(--text-button-secondary)]">Дивитись більше</a>
      </div>
      <div class="hidden lg:block w-50 h-[1px] rounded-full bg-[var(--bg-button-primary)] mt-26"></div>
      <ul class="hero-bottom hidden lg:block lg:flex gap-8 mt-6" aria-label="Преимущества консультации">
        <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none" />
            <path fill="#80716A" d="M5 4h13a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3h-4.5l.5 3h1v1H8v-1h1l.5-3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3m5.5 13l-.5 3h3l-.5-3zM5 5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h13a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" />
          </svg>
          <p>Онлайн</p>
        </li>
        <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none" />
            <path fill="#80716A" d="M8.75 11.17q0 1.13 1.125 2.165q1.125 1.034 1.858 1.73q.13.106.27.106t.265-.102q.751-.675 1.866-1.728t1.116-2.172q0-.727-.53-1.252q-.531-.525-1.266-.525q-.448 0-.833.172t-.621.474q-.242-.303-.626-.474q-.383-.172-.828-.172q-.727 0-1.261.525q-.535.525-.535 1.252m2.964 9.648q-.15-.025-.282-.075q-2.951-1.125-4.691-3.816Q5 14.235 5 11.1V6.817q0-.514.293-.926q.292-.412.757-.597l5.385-2q.292-.106.565-.106t.566.106l5.384 2q.464.186.757.597q.293.412.293.926V11.1q0 3.135-1.74 5.826t-4.692 3.816q-.131.05-.281.075t-.287.025t-.287-.025M12 19.9q2.6-.825 4.3-3.3t1.7-5.5V6.798q0-.192-.106-.346q-.105-.154-.298-.23l-5.384-2q-.096-.04-.212-.04t-.212.04l-5.384 2q-.193.076-.298.23Q6 6.606 6 6.798V11.1q0 3.025 1.7 5.5t4.3 3.3m0-7.861" />
          </svg>
          <p>Конфіденційність</p>
        </li>
        <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <path d="M0 0h20v20H0z" fill="none" />
            <path fill="#80716A" d="M17.962 5.309a.5.5 0 0 1-.108.545l-2 2A.5.5 0 0 1 15.5 8h-2.793l-1.353 1.353a1.5 1.5 0 1 1-.707-.707L12 7.293V4.5a.5.5 0 0 1 .146-.354l2-2A.5.5 0 0 1 15 2.5V5h2.5a.5.5 0 0 1 .462.309M16.293 6H14.5a.5.5 0 0 1-.5-.5V3.707l-1 1V7h2.293zm1.314 1.515C17.862 8.297 18 9.133 18 10a8 8 0 1 1-5.515-7.606l-.808.808a7 7 0 1 0 5.121 5.122zM14.9 9q.1.486.1 1a5 5 0 1 1-4-4.9v1.026A4 4 0 1 0 13.874 9z" />
          </svg>
          <p>Індивідуальний підхід</p>
        </li>
      </ul>
    </div>
    <div class="relative z-10 shrink-0 w-full h-full">
      <img
          v-if="acf.hero_image?.url"
          :src="acf.hero_image.url"
          :alt="acf.hero_image.alt || acf.hero_title || 'hero'"
          class="hidden lg:block w-full h-full object-cover object-top"
        />
    </div>

    <svg class="hidden lg:block lg:absolute left-[-8] top-0 z-10 h-full w-[70%]" viewBox="0 0 650 800" preserveAspectRatio="none">
      <path
        d="M0 0H520
        C480 100 435 170 420 280
        C400 420 450 540 530 650
        C560 700 580 750 605 800
        H0Z"
        fill="#F7F1EF"
      />
    </svg>
    <div
    class="
        block lg:hidden absolute
        inset-x-4
        bottom-2
        h-[400px]
        overflow-hidden
        rounded-[50%_50%_45%_55%/45%_45%_55%_55%]
    "
>
    <img
        v-if="acf.hero_image?.url"
        :src="acf.hero_image.url"
        :alt="acf.hero_image.alt || acf.hero_title || 'hero'"
        class="w-full h-full object-cover object-top"
    />
</div>
  </section> 
</template>

