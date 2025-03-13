<template>
  <IonPage>

   <div v-for="service in services">
      <div class="text-green-500">
        {{ service.id }}
      </div>
      <div class="text-blue-500">
        {{ service.name }}
      </div>
   </div>
  </IonPage>
 </template>
 
 <script setup>
 import { ref, onMounted } from 'vue'
 import { onIonViewWillEnter } from '@ionic/vue'
 const serviceStore = useServicesStore()
 const services = ref([])
 const loading = ref(false)
  function getServices(){
    serviceStore.fetchServices()
    .then((res)=>{
      services.value = res
    })
  }
 onIonViewDidEnter(async () => {
  getServices()
   
 })
 </script>
 