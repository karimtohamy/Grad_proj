<template>
  <div class="w-full">
    <h4 class="ps-6 text-main">
      Featured service providers
    </h4>
    <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 p-6">
  <div v-for="provider in props.featured" class="bg-white flex items-center rounded-lg p-4 shadow-md space-x-8">
    <img src="https://avatar.iran.liara.run/public/25" alt="" class="w-12 h-12 rounded-full">
    <div class="flex flex-col justify-center ">
      <div class="font-semibold text-main">{{ provider.name }}</div>
      <div class="text-sm text-main">{{provider.service_name}}</div>
      <div class="flex items-center mt-1 text-yellow-500">
        <ion-icon :icon="ioniconsStar" class="text-lg"></ion-icon>
        <span class="ml-1 text-sm text-[#598392]">{{provider.received_reviews_avg_rating}}</span>
        <span class="text-sm flex items-center text-[#598392]">({{ provider.received_reviews_count }} Reviews)</span>
      </div>
    </div>
  </div>
  
</div>

  </div>
</template>

<script  setup>
  const props = defineProps({
    featured:Object
  })
</script>

<style>

</style>