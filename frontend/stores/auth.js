import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    token: localStorage.getItem('token') || null,
    user: JSON.parse(localStorage.getItem('user')) || null,
  }),
  actions: {
    //actions (api calls)
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
    async logout() {
      const { $axios } = useNuxtApp();

      const {data} = await $axios.post('/logout')
      this.token = null;
      this.user = null;
      localStorage.removeItem("token");
      localStorage.removeItem("user");
      return data.message
    },
    async forgetPassword(email){
      const { $axios } = useNuxtApp();

      const {data} = await $axios.post('/forgot-password',{email}) 
      return data
    },
    //mutations (state managment)
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
