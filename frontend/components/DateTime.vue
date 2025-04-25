<template>
  <div>
    <!-- Date Display -->
    <div class="grid grid-cols-2 gap-6 px-5">
      <div
        class="rounded-xl border p-4 shadow-md bg-gray-200 text-center flex items-center justify-center cursor-pointer"
        @click="showDateModal">
        <IonIcon :icon="ioniconsCalendarNumberOutline" class="text-2xl me-3" />
        {{ formattedDate }}
      </div>

      <div
        class="rounded-xl border p-4 shadow-md bg-gray-200 text-center flex items-center justify-center cursor-pointer"
        @click="showTimeModal">
        <IonIcon :icon="ioniconsTimeOutline" class="text-2xl me-3" />

        {{ formattedTime }}
      </div>
    </div>

    <!-- Date Modal -->
    <ion-modal :is-open="isDateModalOpen" @didDismiss="isDateModalOpen = false">
      <div class="p-4 bg-white">
        <ion-datetime v-model="tempDate" presentation="date" :min="minDate" :max="maxDate" />
        <div class="mt-4 flex justify-end gap-2">
          <ion-button fill="clear" color="medium" @click="isDateModalOpen = false">Cancel</ion-button>
          <ion-button @click="confirmDate">Done</ion-button>
        </div>
      </div>
    </ion-modal>

    <!-- Time Modal -->
    <ion-modal :is-open="isTimeModalOpen" @didDismiss="isTimeModalOpen = false">
      <div class="p-4 bg-white">
        <ion-datetime v-model="tempTime" presentation="time" />
        <div class="mt-4 flex justify-end gap-2">
          <ion-button fill="clear" color="medium" @click="isTimeModalOpen = false">Cancel</ion-button>
          <ion-button @click="confirmTime">Done</ion-button>
        </div>
      </div>
    </ion-modal>
  </div>
</template>

<script setup>

const emit = defineEmits(['changeDate', 'changeTime'])

const date = ref(new Date().toISOString().split('T')[0])
const time = ref(new Date().toISOString())

const tempDate = ref(date.value)
const tempTime = ref(time.value)

const isDateModalOpen = ref(false)
const isTimeModalOpen = ref(false)
const currentYear = new Date().getFullYear()

const minDate = `${currentYear}-01-01`
const maxDate = `${currentYear}-12-31`

const showDateModal = () => {
  tempDate.value = date.value
  isDateModalOpen.value = true
}

const showTimeModal = () => {
  tempTime.value = time.value
  isTimeModalOpen.value = true
}

const confirmDate = () => {
  date.value = tempDate.value
  isDateModalOpen.value = false
  emit('changeDate', date.value)
}

const confirmTime = () => {
  time.value = tempTime.value
  isTimeModalOpen.value = false
  emit('changeTime', time.value)
}

const formattedDate = computed(() => {
  return new Date(date.value).toLocaleDateString('en-GB', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric'
  })
})

const formattedTime = computed(() => {
  return new Date(time.value).toLocaleTimeString('en-US', {
    hour: '2-digit',
    minute: '2-digit',
    hour12: true
  })
})
</script>
