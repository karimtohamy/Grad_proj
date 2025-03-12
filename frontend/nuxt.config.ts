// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";
export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      apiBase: process.env.API_BASE || "http://localhost:3000/api",
    },
  },
  compatibilityDate: "2024-11-01",

  devtools: { enabled: true },

  modules: ["@nuxtjs/ionic", "@pinia/nuxt"],
  ssr: false,
  css: ["~/assets/css/main.css"],

  vite: {
    plugins: [tailwindcss()],
  },
  ionic: {
    integrations: {
      //
    },
    css: {
      basic: false,
      core: false,
    },
  },
});
