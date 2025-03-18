<template>
  <div>

    <h4 class="text-main text-start z-10 w-full ps-6">
      Our Services
    </h4>
  <div class="flex justify-center w-full mt-5">
    <div class="overflow-x-auto snap-x snap-mandatory p-4 scroll-smooth mx-auto lg:w-full">
      <div class="grid grid-rows-2 grid-flow-col auto-cols-max gap-4 lg:justify-center">
        <div v-for="service in props.service" :key="service.id"
          class="bg-white rounded-lg p-4 w-[28vw] lg:w-30 h-20 text-center flex items-center justify-center snap-center">
          {{ service.name }}
        </div>
        <div class="w-0.5 lg:w-0"></div>
      </div>
    </div>
  </div>
</div>

</template>



<script setup>
const props = defineProps({
  service: Object
})
</script>
<style scoped></style>