<script setup>
import { inject, computed, ref, onMounted, onUnmounted, watch } from "vue";
const wpData = inject("wpData");
const menus = computed(() => wpData.menus ?? {});
const logo = computed(() => wpData.logo ?? {});
const site_url = computed(() => wpData.site_url ?? {});

const mobileMenuOpen = ref(false)
const closeMobileMenu = () => {
  mobileMenuOpen.value = false
  document.body.style.overflow = ''
}
watch(mobileMenuOpen, (value) => {
    document.body.classList.toggle("overflow-hidden", value);
});
const isHero = ref(true)
const handleScroll = () => {
  const hero = document.getElementById('hero_section');
  if(!hero) return
  isHero.value = window.scrollY <= hero.offsetHeight - window.innerHeight * 0.2
 }
onMounted(()=>{
    window.addEventListener('scroll', handleScroll)
})
onUnmounted(()=>{
  window.removeEventListener('scroll',handleScroll)
})
</script>
<template>
  <header class="fixed left-0 top-0 z-50 w-full">
      <div :class="['fixed flex justify-between items-center lg:flex fixed w-full z-50 text-[var(--text-primary)] px-10 lg:px-15 transition-all duration-500 ease-in-out', isHero ? 'bg-[var(--bg-menu)]' : 'bg-white shadow-sm shadow-[var(--circle-tertiary)]']">
         <!-- Logo -->
          <div>
            <a v-if="logo" :href="site_url" class="logo" aria-label="Повернутися на головну сторінку">
              <img :src="logo" alt="Логотип сайту" class="w-30 lg:w-32 py-2" />
            </a>
          </div>
         <!-- Navigation -->
         <nav aria-label="Головне меню сайту">
            <ul class="hidden lg:flex w-full items-center justify-center gap-8">
              <li v-for="(item, index) in menus.main" :key="item.url">
                <a v-if="item.title" :href="item.url" class="menu_link" >
                  {{ item.title }}
                </a>
              </li>
            </ul>
         </nav>
         <!-- Burger Menu -->
         <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="cursor-pointer lg:hidden flex flex-col justify-between w-6 h-4 relative" :aria-label="mobileMenuOpen ? 'Закрити меню' : 'Відкрити меню'" :aria-expanded="mobileMenuOpen" aria-controls="mobile-menu">
            <span :class="[ 'block h-0.5 w-full bg-[#463028] transform transition-all duration-300 ease-in-out origin-center rounded-full', mobileMenuOpen ? 'rotate-45 translate-y-1.5' : '']"></span>
            <span :class="['block h-0.5 w-full bg-[#463028] transform transition-all duration-300 ease-in-out rounded-full', mobileMenuOpen ? 'opacity-0' : '']"></span>
            <span :class="[ 'block h-0.5 w-full bg-[#463028] transform transition-all duration-300 ease-in-out origin-center rounded-full', mobileMenuOpen ? '-rotate-45 -translate-y-2' : '']"></span>
         </button>
         <!-- Button -->
         <a href="#" class="last_menu_link" aria-label="Записатись на консультацію">Записатись онлайн</a>
      </div>
      <!-- Mobile Menu -->
      <transition name="slide-fade">
         <div id="mobile-menu" v-if="mobileMenuOpen" role="dialog" aria-modal="true" aria-label="Мобільне меню" @click="closeMobileMenu" :class="['lg:hidden w-full min-h-screen bg-[var(--bg-menu)] px-6 pt-28 overscroll-y-none', isHero ? 'bg-[var(--bg-menu)]' : 'bg-white shadow-sm shadow-[var(--circle-tertiary)]']">
            <ul class="flex flex-col gap-6 text-center">
               <li v-for="(item, index) in menus.main" :key="item.url">
                  <a v-if="item.title" :href="item.url" class="menu_link">
                    {{ item.title }}
                  </a>
                </li>
                <li>
                  <a href="#" class="burger_menu_link" aria-label="Записатись на консультацію">Записатись онлайн</a>
                </li>
            </ul>
         </div>
      </transition>
  </header>
</template>
<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
  transition: all 0.4s ease;
}
.slide-fade-enter-from {
  transform: translateY(-20px);
  opacity: 0;
}
.slide-fade-enter-to {
  transform: translateY(0);
  opacity: 1;
}
.slide-fade-leave-from {
  transform: translateY(0);
  opacity: 1;
}
.slide-fade-leave-to {
  transform: translateY(-20px);
  opacity: 0;
}
</style>
