<template>
  <IonPage>
    <IonContent class="custom-content">
      <NavBar />
      <Services :loading="loading" :services="services" />
      <Featured :loading="loading" :featured="featured" />
    </IonContent>
  </IonPage>
</template>

<script setup>
definePageMeta({
  alias: ['/', '/tabs/home', '/tabs'],
})
import { Geolocation } from '@capacitor/geolocation'
import { Preferences } from '@capacitor/preferences'
const serviceStore = useServicesStore()
const services = ref([])
const featured = ref([])
const loading = ref(false)
const coords = ref(null)
const accuracy = ref(null)
const error = ref(null)
const isGettingLocation = ref(false)

onIonViewWillEnter(async () => {
  await getHomePageData();


  isGettingLocation.value = true
  error.value = null

  try {
    const { location } = await Geolocation.checkPermissions()

    if (location !== 'granted') {
      const result = await Geolocation.requestPermissions()

      if (result.location !== 'granted') {
        return
      }
    }
    const position = await Geolocation.getCurrentPosition({
      enableHighAccuracy: true
    })
    Preferences.set({
      key: 'location',
      value: JSON.stringify(position)
    });
    coords.value = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    }

    accuracy.value = position.coords.accuracy

    console.log('✅ Location obtained:', coords.value)
    console.log('🎯 Accuracy:', accuracy.value, 'meters')

  } catch (err) {
    error.value = err.message || '❌ Failed to get location.'
    console.error('💥 Geolocation error:', err)
  }
  isGettingLocation.value = false
})

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

<style scoped lang="scss"></style>