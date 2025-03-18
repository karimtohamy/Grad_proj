<template>
    <IonTabs>
        <IonRouterOutlet class="" />
        <IonTabBar slot="bottom" class="flex justify-around bg-main py-2 border-t text-background border-gray-200 shadow-md">
            <IonTabButton tab="home" href="/tabs/home"
                class="flex flex-col items-center bg-main ">
                <ion-icon :icon="ioniconsHomeOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Home</IonLabel>
            </IonTabButton>

            <IonTabButton tab="profile" href="/tabs/profile"
                class="flex flex-col items-center  bg-main ">
                <ion-icon :icon="ioniconsPersonOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Profile</IonLabel>
            </IonTabButton>

            <IonTabButton tab="chat" href="/tabs/chat"
                class="flex flex-col items-center  bg-main ">
                <ion-icon :icon="ioniconsChatbubblesOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Chat</IonLabel>
            </IonTabButton>

            <IonTabButton tab="bookings" href="/tabs/bookings"
                class="flex flex-col items-center  bg-main ">
                <ion-icon :icon="ioniconsCalendarOutline" class="text-background"></ion-icon>
                <IonLabel class="text-background">Bookings</IonLabel>
            </IonTabButton>
        </IonTabBar>




    </IonTabs>
</template>

<script setup>
</script>