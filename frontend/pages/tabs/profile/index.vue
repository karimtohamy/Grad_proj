<template>
  <IonPage class="">
    <IonContent>

      <div @click="logout" class="mt-5 bg-emerald-600 h-12">
        Logout
      </div>
    </IonContent>
  </IonPage>
</template>

<script  setup>
const authStore = useAuthStore();
const router = useRouter()
async function logout() {
  await authStore.logout();
  router.go('/auth/login');
}

</script>

<style>

</style>