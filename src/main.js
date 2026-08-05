import { createApp } from 'vue';
import App from './App.vue';

const app = createApp(App)
app.provide('wpData', window.wpVueData ?? {})
app.mount('#app')
