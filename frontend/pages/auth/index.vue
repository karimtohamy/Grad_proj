<template>
  <IonPage>
    <div class="">
      <div class="flex w-full justify-end">
        <img src="/logo.png" alt="" class="size-10">
      </div>

      <div class="px-6 mt-10">
        <div>
          <span class="text-main font-bold text-6xl">Welcome Back!</span>
          <div class="mt-16 flex flex-col items-center">

            <form @submit.prevent="login" class="w-full">

              <!-- Email Input -->
              <div>
                <input type="email" id="email" aria-describedby="helper-text-explanation"
                  class="border-b-2 border-main placeholder:text-main !text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                  v-model="user.email" placeholder="Email" />
                <p id="helper-text-explanation" class="text-red-500 text-sm mt-1">{{ errMsg }}</p>
              </div>

              <!-- Password Input -->
              <div class="mt-4">
                <input type="password" id="password"
                  class="border-b-2 border-main placeholder:text-main !text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                  v-model="user.password" placeholder="Password" />
              </div>

              <!-- Remember Me & Forgot Password -->
              <div class="flex justify-between mt-5 text-main">
                <label class="flex items-center space-x-2">
                  <input type="checkbox" name="remember_me" />
                  <span class="ms-1">Remember me</span>
                </label>
                <a href="#" class="!text-main">Forgot Password?</a>
              </div>

              <!-- Submit Button -->
              <div class="mt-7">
                <button
                  class="bg-main h-10 text-white w-full py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-main"
                  type="submit">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Don't Have An Account Section -->
        <div class="fixed bottom-4 left-0 right-0 text-center text-main">
          <span>Don't have an account?</span><a href="" class="!text-main ms-2 font-bold text-lg">Sign Up</a>
        </div>
      </div>


    </div>
  </IonPage>
</template>

<script setup>



const userAuth = useAuthStore()
const user = ref({})
const errMsg = ref('')
function login() {
  return userAuth.login(user.value)
    .then((res) => res.data)
    .catch((err) => {
      errMsg.value = err.response?.data?.message;
      throw err;
    });
}
</script>

<style></style>