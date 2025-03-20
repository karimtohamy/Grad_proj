<template>
  <IonPage >
    <IonContent class="custom-content">
      <NavBar/>
      <Services :loading="loading" :services="services"/>
      <Featured :loading="loading" :featured="featured"/>
    </IonContent>
  </IonPage>
</template>

<script setup>
definePageMeta({
  alias: ['/','/tabs/home','/tabs'],
})
 const serviceStore = useServicesStore()
 const services = ref([])
 const featured = ref([])
 const loading = ref(false)
 
 onIonViewWillEnter(async () => {
  await getHomePageData();
});

async function getHomePageData() {
  loading.value = true;
  try {
    const res = await serviceStore.getHomepageData();
    services.value = res.services;
    featured.value = res.featured_providers;
  } finally {
    loading.value = false;
  }
}

</script>

<style scoped lang="scss">


</style>