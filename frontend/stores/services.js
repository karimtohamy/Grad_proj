import { defineStore } from "pinia";
const { $axios } = useNuxtApp();

export const useServicesStore = defineStore("servicesStore", {
  state: () => ({
    services: [],
    serviceProviders: [],
  }),
  actions: {
    async getHomepageData() {
      const { data } = await $axios.get("/homepage");
      this.services = data.services;
      return data;
    },
    async fetchServices() {
      const { data } = await $axios.get("/services");
      this.services = data.services;
      return data.services;
    },
    async fetchServiceProviders(service_id) {
      const { data } = await $axios.get(`/services/${service_id}`);
      return data.service_providers;
    },

    async fetchServiceProvider(provider_id) {
      const response = await $axios.get(`/providers/${provider_id}`);
      return response;
    },
  },
});
