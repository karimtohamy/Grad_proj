<template>
  <div>

    youre Currently in {{ res.display_name }}
    <!-- {{ res }} -->
  </div>
</template>

<script setup>
import { Preferences } from '@capacitor/preferences';
const res = ref({})
onBeforeMount(async () => {

  const stored = await Preferences.get({ key: 'location' });
  const { coords } = JSON.parse(stored.value)
  console.log(coords);

  const apiKey = 'pk.6f50cc99ae9739b6afbb23552316d5fd'

  const url = `https://us1.locationiq.com/v1/reverse?key=${apiKey}&lat=${coords.latitude}&lon=${coords.longitude}&format=json`
  console.log(url);

  try {
    const response = await fetch(url)

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`)
    }

    emit('coords', { latitude: coords.latitude, longitude: coords.longitude })
    res.value = await response.json()
  } catch (error) {
    console.error('❌ Failed to reverse geocode:', error.message)
    throw error
  }
})

const emit = defineEmits(['coords'])
</script>

<style></style>