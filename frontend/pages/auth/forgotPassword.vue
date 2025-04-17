<template>
  <IonPage>
    <IonContent>
      <div class="flex w-full justify-end">
        <img src="/logo.png" alt="" class="size-10">
      </div>

      <div class="px-6 mt-10">
        <div>
          <span class="text-main font-bold text-5xl lg:text-6xl">Forgot Your password?</span>
          <p class="text-main mt-5">
            Enter your email below and we'll send you a link to change a new password
          </p>
          <div class="mt-16 flex flex-col items-center">

            <form @submit.prevent="forgetPassword" class="w-full">

              <div>
                <input type="email" id="email" v-model="email" aria-describedby="helper-text-explanation"
                  class="border-b-2 border-main placeholder:text-main !text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                  placeholder="Email" />
                <!-- <p id="helper-text-explanation" class="text-red-500 text-sm mt-1">{{ errMsg }}</p> -->
              </div>
              <div class="mt-7">
                <button
                  class="bg-main h-10 text-white w-full py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-main"
                  type="submit">
                  Send verification Link
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </IonContent>
  </IonPage>
</template>

<script setup>
  const authStore = useAuthStore();
  const email = ref('')
  function forgetPassword() {
    authStore.forgetPassword(email.value)
  }
</script>

<style></style>