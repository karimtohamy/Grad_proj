<template>
  <IonPage >
    <NavBar/>
    <IonContent class="custom-content">

      <Services :service="services"/>
      <Featured :featured="featured"/>
    </IonContent>
  </IonPage>
</template>

<script setup>
definePageMeta({
  alias: ['/','/tabs/home'],
})
 const serviceStore = useServicesStore()
 const services = ref([])
 const featured = ref([])
 const loading = ref(false)
  function getHomePageData(){
    serviceStore.getHomepageData()
    .then((res)=>{
      services.value = res.services
      featured.value = res.featured_providers
    })
  }
 onIonViewDidEnter(async () => {
  getHomePageData()
   
 })
</script>

<style scoped lang="scss">


</style>