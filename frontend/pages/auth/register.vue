<template>
    <IonPage>

        <div class="px-6 pt-7">
            <div class="flex justify-end w-full">

                <img src="/logo.png" alt="" class="size-10">
            </div>
            <div class="text-main font-bold text-6xl">
                Hi !
                Welcome
                <p class="text-sm">
                    Let's create an account
                </p>
            </div>
            <form @submit.prevent="register" class="space-y-3 pt-9 !text-main">
                <!-- Email -->
                <div>
                    <input type="email" id="email"
                        class="border-b-2 border-main placeholder:text-main text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                        v-model="user.email" placeholder="Email" />
                </div>
                <div>
                    <input type="text" id="phone"
                        class="border-b-2 border-main placeholder:text-main text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                        v-model="user.phone" placeholder="Phone Number" />
                </div>
                <!-- Name in English -->
                <div>
                    <input type="text" id="firstName"
                        class="border-b-2 border-main placeholder:text-main text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                        v-model="user.name_en" placeholder="Name in English" />
                </div>

                <!-- Name in Arabic -->
                <div>
                    <input type="text" id="lastName"
                        class="border-b-2 border-main placeholder:text-main text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                        v-model="user.name_ar" placeholder="Name in Arabic" />
                </div>

                <!-- Phone Number -->


                <!-- Password -->
                <div>
                    <input type="password" id="password"
                        class="border-b-2 border-main placeholder:text-main text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                        v-model="user.password" placeholder="Password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <input type="password" id="passwordConfirmation"
                        class="border-b-2 border-main placeholder:text-main text-main text-sm focus:outline-none block w-full p-2.5 bg-background"
                        v-model="user.password_confirmation" placeholder="Confirm Password" />
                </div>

                <!-- Error Message -->
                <div class="text-red-500 text-sm">{{ errMsg }}</div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="bg-main mt-6 text-white w-full h-10 rounded-lg focus:outline-none focus:ring-2 focus:ring-main">
                        Submit
                    </button>
                </div>
            </form>
            <div class="fixed bottom-4 left-0 right-0 text-center text-main">
                <span>Have an account?</span><a href="" class="!text-main ms-2 font-bold text-lg">Login</a>
            </div>
        </div>

    </IonPage>
</template>
<script setup>
const user = ref({})
const errMsg = ref('')
const userAuth = useAuthStore()

function register() {
    return userAuth.register(user.value)
        .then((res) => {
        })
}
</script>