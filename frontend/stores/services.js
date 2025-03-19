import { defineStore } from "pinia";
const { $axios } = useNuxtApp();

export const useServicesStore = defineStore("servicesStore", {
  state: () => ({
    services: [],
    serviceProviders: [],
    loading: false,
  }),
  actions: {
    async getHomepageData() {
      this.loading = true;

      const { data } = await $axios.get("/homepage");
      this.services = data.services;

      this.loading = false;

      return data;
    },
    async fetchServices() {
      const { data } = await $axios.get("/services");
      this.services = data.services;
      return data.services;
    },
    async fetchServiceProviders(service_id) {
      const response = await $axios.get(`/services/${service_id}`);
      return response.data;
    },

    async fetchServiceProvider(provider_id) {
      const response = await $axios.get(`/providers/${provider_id}`);
      return response;
    },
  },
});
