<template>
  <IonPage>
    {{response}}
  </IonPage>
</template>

<script  setup>
const route = useRouter().currentRoute.value
const id = route.params.id
const response = ref()
onMounted(()=>{
  useServicesStore().fetchServiceProviders(id)
  .then((res)=>{
    response.value = res 
  })
})
</script>

<style>

</style>