<template>
  <IonPage>
    <IonContent>
      <div class="px-3 grid grid-cols-1">

        <div>
          Bookings
        </div>
        <div class="rounded-xl flex bg-white">
          <img />

        </div>
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