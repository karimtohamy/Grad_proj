// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";
export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      apiBase: process.env.API_BASE ,
    },
  },
  compatibilityDate: "2024-11-01",
  ssr: false,

  devtools: { enabled: true },

  modules: ["@nuxtjs/ionic", "@pinia/nuxt"],
  css: ["~/assets/css/main.css",'@/theme/variables.scss'],

  vite: {
    plugins: [tailwindcss()],
  },

});
