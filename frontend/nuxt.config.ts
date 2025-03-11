// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',

  devtools: { enabled: true },

  modules: [
    '@nuxtjs/ionic'
  ],
  ssr:false,
  css: ['~/assets/css/main.css'],

  vite: {
    plugins: [
      tailwindcss(),
    ],
  },
  ionic: {
    integrations: {
      //
    },
    css: {
      basic:false,
      core:false
    },
    config: {
      //
    }
  },

})