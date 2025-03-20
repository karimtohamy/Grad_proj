<template>
  <div>

    <h4 class="text-main text-start z-10 w-full ps-6">
      Our Services
    </h4>

    <div v-if="props.loading" class="flex justify-center w-full mt-5">
      <div class="overflow-x-auto snap-x snap-mandatory p-4 scroll-smooth mx-auto lg:w-full">
        <div class="grid grid-rows-2 grid-flow-col auto-cols-max gap-4 lg:justify-center">
          <div v-for="n in 6" :key="n" class="bg-gray-300 rounded-lg animate-pulse w-[28vw] lg:w-30 h-20 snap-center">
          </div>
          <div class="w-0.5 lg:w-0"></div>
        </div>
      </div>
    </div>
    <div v-else class="flex justify-center w-full mt-5">
      <div class="overflow-x-auto snap-x snap-mandatory p-4 scroll-smooth mx-auto lg:w-full">
        <div class="grid grid-rows-2 grid-flow-col auto-cols-max gap-4 lg:justify-center">
          <div  @click="navigate(service.id)" v-for="service in props.services" :key="service.id"
            class="bg-white rounded-lg p-4 w-[28vw] lg:w-30 h-20 text-center shadow flex items-center justify-center snap-center">
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
  services: Object,
  loading: Boolean
})
const router = useIonRouter()
function navigate(id){
  router.push({name:'tabs-home-service_id',params:{id:id}})
}

</script>
<style scoped>


</style>