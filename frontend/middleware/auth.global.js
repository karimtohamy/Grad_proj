export default defineNuxtRouteMiddleware((to, from) => {
  const token = useAuthStore().$state.token

  // if (to.name && to.name.includes('auth') && token) {
  //   return navigateTo('/');
  // }

  // if (to.name && !to.name.includes('auth') && !token) {
  //   return navigateTo();
  // }


});
