import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    token: localStorage.getItem('token') || null,
    user: JSON.parse(localStorage.getItem('user')) || null,
  }),
  actions: {
    async login(credentials) {
      const { $axios } = useNuxtApp();
      const { data } = await $axios.post('/login', credentials);
      if (data.token) {
        this.setToken(data.token);
        this.setUser(data.user);
        navigateTo('/')
      }
      return data;
    },
    async register(credentials) {
      const { $axios } = useNuxtApp();
      const response = await $axios.post('/register', credentials);
      console.log(response.data.token);
      return response;
    },
    logout() {
      this.token = null;
      this.user = null;
      localStorage.removeItem("token");
    },
    setToken(token) {
      this.token = token;
      localStorage.setItem("token", token);
    },
    setUser(user) {
      this.user = user;
      localStorage.setItem('user', JSON.stringify(user));
    },
  },
  persist: true,
});
