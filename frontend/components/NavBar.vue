<template>

  <div class="w-full flex flex-col bg-[#124559] text-[#eff6e0] pt-9 pb-5 ">
    <div class="flex justify-between px-6 items-center">
      <div v-if="user">
        <div>
          welcome <br>
          {{ user.name }}
        </div>
      </div>
      <div v-else>
        <ion-button fill="clear" :router-link="{path:'/auth'}" class="text-background ">
          Login
        </ion-button>
      </div>
      <div class="relative">
        <div class="absolute bg-background size-2 rounded-full start-0.5"></div>
        <ion-icon :icon="ioniconsNotificationsOutline" class="text-background size-6"></ion-icon>
      </div>
    </div>
    <div class="px-5 block mt-5 text-main">

    <div class="relative justify-center flex items-center  h-12 rounded-lg focus-within:shadow-lg bg-background overflow-hidden">
       

        <input
        class="peer h-full w-full outline-none font-medium  pr- z-10 ps-6 bg-background text-main "
        type="text"
        id="search"
        placeholder="Search " /> 
        <div class="grid place-items-center h-full w-12 text-main">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
  </div>

  </div>

</template>

<script setup>
const user = useAuthStore().$state.user
</script>

<style scoped lang="scss">
ion-button{
  background: none;
}
</style>