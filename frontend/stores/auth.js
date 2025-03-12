import { defineStore } from "pinia";
  export const useAuthStore = defineStore("auth", {
  state: () => ({
    token: null,
    user: null,
  }),
  actions: {
    async login(credentials) {
      const { $axios } = useNuxtApp();

      const response = await $axios.post('/login',credentials) 
      console.log('web response',response);
      
    },
    async register(credentials){
      const { $axios } = useNuxtApp();
      const response = await $axios.post('/register',credentials)
      this.setToken(response.token)
      return response
    },
    logout() {
      this.token = null;
      this.user = null;
      sessionStorage.removeItem("token");
    },
  },
  mutations: {
    setToken(token) {
      debugger
      this.token = token;
      sessionStorage.setItem("token", token);
    },
    setUser(user) {
      this.user = user;
    },
  },
  persist: true,
});
