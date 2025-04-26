<template>
  <IonPage>
    <IonContent>
      <div>
        Bookings
      </div>
      <div class="rounded-xl flex bg-white">
        {{response}}

      </div>
    </IonContent>

  </IonPage>
</template>

<script setup>
const bookingStore = useBookingsStore();
const response = ref()
onIonViewWillEnter(async()=>{
   response.value = await bookingStore.fetchAllBookings()


})
</script>

<style></style>