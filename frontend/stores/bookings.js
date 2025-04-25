import { defineStore } from 'pinia'
const { $axios } = useNuxtApp();
export const useBookingsStore = defineStore('BookingsStore',{
  state: () => ({ }),
  actions: {
    async createBooking(data){
      const response = await $axios.post('/create-booking', data)
      return response
    }
  }
})
