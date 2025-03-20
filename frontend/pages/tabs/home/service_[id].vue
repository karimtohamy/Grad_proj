<template>
  <IonPage>

    <IonContent>
      <ProviderSkeleton v-if="loading"/>
      <div v-else class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-6 px-4">

        <div  @click="navigate(provider.id)" v-for="provider in providers"
          class="bg-white flex items-center rounded-lg p-4 shadow-md space-x-8 ">
          <img :src="provider.image" lazy alt="" class="w-12 h-12 rounded-full">
          <div class="flex flex-col justify-center">
            <div class="font-semibold text-main">{{ provider.name }}</div>
            <div class="text-sm text-main">{{ provider.service_name }}</div>
            <div class="flex items-center mt-1 text-yellow-500">
              <ion-icon :icon="ioniconsStar" class="text-lg"></ion-icon>
              <span class="ml-1 text-sm text-[#598392]">{{ provider.received_reviews_avg_rating }}</span>
              <span class="text-sm flex items-center text-[#598392]">({{ provider.received_reviews_count }}
                Reviews)</span>
            </div>
          </div>
        </div>
      </div>

    </IonContent>
  </IonPage>
</template>

<script setup>
const route = useRoute();
const router = useIonRouter()
const servicesStore = useServicesStore()
const serviceId = computed(() => route.params.id || null);
const providers = ref({});
const loading = ref(true)
onIonViewWillEnter(() => {

  if (serviceId != null) {
    servicesStore.fetchServiceProviders(serviceId.value)
      .then((res) => {
        providers.value = res
        loading.value = false
      })
  }

})
function navigate(providerId) {
  router.push({ name: 'tabs-home-provider_id', params: { id: providerId } })
}
</script>
