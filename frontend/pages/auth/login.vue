<template>
  <IonPage>
    <div class="px-32">

      <form @submit.prevent="login" class="">

        <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="email" id="helper-text" aria-describedby="helper-text-explanation"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          v-model="user.email"
          placeholder="Email">
          {{ errMsg }}
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          v-model="user.password"
          placeholder="Password">
        <IonButton type="submit">Login</IonButton>
      </form>
    </div>
  </IonPage>
</template>

<script setup>


definePageMeta({
  layout: 'authlayout'
});
const userAuth = useAuthStore()
const user = ref({});
const errMsg = ref('')
function login() {
  return userAuth.login(user.value)
    .then((res) => res.data)
    .catch((err) => {
      errMsg.value = err.response?.data?.message ;
      throw err;
    });
}
</script>

<style></style>