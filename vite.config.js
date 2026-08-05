import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import { resolve } from 'path'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [vue(), tailwindcss()],

    base: './',

    build: {
        outDir: 'dist',
        emptyOutDir: true,
        manifest: true,

        rollupOptions: {
            input: {
                main: resolve(__dirname, 'src/main.js'),          // ton JS front-end
                // editorStyle: resolve(__dirname, 'src/editor-style.css')  // CSS back-office
            }
        }
    },
})