<template>
  <IonPage>
    <IonContent>
      {{ providers }}
    </IonContent>
  </IonPage>
</template>

<script  setup>
const route = useRoute();
const servicesStore = useServicesStore()
const serviceProviderId = computed(() => route.params.id || null);
const providers = ref([]);
const loading = ref(false)
onIonViewWillEnter(() => {
  servicesStore.fetchServiceProvider(serviceProviderId.value)
    .then((res) => {
      providers.value = res
    })

})
</script>

<style>

</style>