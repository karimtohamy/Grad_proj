import axios from "axios";
import { useAuthStore } from '~/stores/auth'

export default defineNuxtPlugin((nuxtApp) => {
  const runtimeConfig = useRuntimeConfig();
  const axiosInstance = axios.create({
    baseURL: runtimeConfig.public.apiBase,
  });

  axiosInstance.interceptors.request.use(
    (config) => {
      config.headers['accept-language'] = 'en';
      config.headers["ngrok-skip-browser-warning"] = "69420"
      const token = useAuthStore().token;
      if (token) {
        config.headers.Authorization = `Bearer ${token}`;
      }
      return config;
    },
    (error) => Promise.reject(error)
  );

  axiosInstance.interceptors.response.use(
    (response) => response,
    (error) => {
      if (error.response && error.response.status === 401) {
        useAuthStore().logout();
        sessionStorage.removeItem("token");
        navigateTo("/auth/login"); // Redirect to your login page
      }
      return Promise.reject(error);
    }
  );

  return {
    provide: { axios: axiosInstance },
  };
});
