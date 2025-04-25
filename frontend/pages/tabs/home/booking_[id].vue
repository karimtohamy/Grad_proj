<template>
    <IonPage>
        <IonContent class="p-4 space-y-6">
            <div class="text-center text-lg font-semibold">Please select a date and time</div>
           
            <DateTime @changeDate="handleDate" @changeTime="handleTime" />
            <Address @coords="logLocation"/>
            <div v-if="response" class="mt-4 text-center text-sm text-blue-600">
                {{ response }}
            </div>

            <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded" @click="createBooking">
                Confirm Booking
            </button>
        </IonContent>
    </IonPage>
</template>

<script setup>
const router = useIonRouter()
const route = useRoute()
const { id } = route.params
const bookingsStore = useBookingsStore()

const date = ref(null)
const time = ref(null)
const response = ref('')
const loc = ref()

const handleDate = (newDate) => {
    date.value = newDate
}

const handleTime = (newTime) => {
    time.value = newTime
}
const logLocation=(newLoc)=>{
    loc.value = newLoc
}
const createBooking = async () => {
    if (!date.value || !time.value) {
        date.value = new Date().toISOString()
        time.value = new Date().toISOString()
        return
    }
    const result = await bookingsStore.createBooking({
        datetime: time.value,
        service_provider_id: id,
        latitude:loc.value.latitude,
        longitude:loc.value.longitude
    })
    response.value = result?.message ?? '✅ Booking created successfully.'

    router.push({name:'tabs-bookings'})
}
</script>