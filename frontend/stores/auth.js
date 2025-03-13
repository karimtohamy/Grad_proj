import { defineStore } from "pinia";

  export const useAuthStore = defineStore("auth", {
  state: () => ({
    token:  localStorage.getItem('token') || null,
    user: null,
  }),
  actions: {
    async login(credentials) {
      const { $axios } = useNuxtApp();

      const response = await $axios.post('/login',credentials) 
      console.log('web response',response);
      navigateTo('/')
    },
    async register(credentials){
      const { $axios } = useNuxtApp();
      const response = await $axios.post('/register',credentials)
      console.log(response.data.token);
    
      return response
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
    },
  },
  persist: true,
});
