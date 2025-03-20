<template>
    
    <IonTabs>

        <IonRouterOutlet />
        <IonTabBar slot="bottom" class="flex justify-around bg-main py-2  text-background shadow-md">
            <IonTabButton @click="goToHome" class="flex flex-col items-center bg-main ">
                <ion-icon :icon="ioniconsHomeOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Home</IonLabel>
            </IonTabButton>


            <IonTabButton tab="profile" href="/tabs/profile" class="flex flex-col items-center  bg-main ">
                <ion-icon :icon="ioniconsPersonOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Profile</IonLabel>
            </IonTabButton>

            <IonTabButton tab="chat" href="/tabs/chat" class="flex flex-col items-center  bg-main ">
                <ion-icon :icon="ioniconsChatbubblesOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Chat</IonLabel>
            </IonTabButton>

            <IonTabButton tab="bookings" href="/tabs/bookings" class="flex flex-col items-center  bg-main ">
                <ion-icon :icon="ioniconsCalendarOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Bookings</IonLabel>
            </IonTabButton>
        </IonTabBar>




    </IonTabs>
</template>

<script setup>
const router = useIonRouter();

function goToHome() {
    router.replace('/tabs/home'); // Forces the router to navigate to 'home/index.vue'
}

</script>