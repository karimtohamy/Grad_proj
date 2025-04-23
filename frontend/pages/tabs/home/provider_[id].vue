<template>
  <IonPage>
    <IonContent>
      <div class="px-5 pt-5">

        <div class=" flex justify-between items-center pt-5">

          <div class="flex items-center">
            <div class="rounded-full me-3 aspect-square border-main border-1 flex items-center justify-center h-8" @click="goback">
              <IonIcon :icon="ioniconsArrowBack" class="text-main" />
            </div>
            <img :src="provider.image" alt="" loading="lazy" class="size-16">
          </div>

          <div class="flex flex-col items-center">

            <span class="underline text-main underline-main text-2xl">{{ provider.name }}</span>
            <StarsComponent :rating="provider.rating" :count="provider.rating_count" />
          </div>

        </div>
        <!-- where comments on teh provider will apear -->
        <div v-if="provider.comments">
          some comments
        </div>
        <div :class="{ 'mt-64': !provider.comments }">
          <button class=" h-9 !px-3 flex items-center justify-center mx-auto !rounded-full bg-blue-400"
            @click="book(provider.id)">
            Book now >
          </button>
        </div>
        {{ provider }}
      </div>

    </IonContent>
  </IonPage>
</template>

<script setup>
import { ref, computed } from 'vue'
import { IonPage, IonContent, onIonViewWillEnter } from '@ionic/vue'
import { star as ioniconsStar, starOutline as ioniconsStarOutline } from 'ionicons/icons'
import { useRoute } from 'vue-router'
import { useServicesStore } from '@/stores/services'
import { StarsComponent } from '#components'

const route = useRoute()
const servicesStore = useServicesStore()
const serviceProviderId = computed(() => route.params.id || null)
const provider = ref({})
const loading = ref(false)
const router = useIonRouter()

onIonViewWillEnter(() => {
  servicesStore.fetchServiceProvider(serviceProviderId.value)
    .then((res) => {
      provider.value = res
    })
})

const goback = ()=>{
    router.back()
}
</script>


<style></style>