export default defineNuxtRouteMiddleware((to, from) => {
  const token = useAuthStore().$state.token
  const router = useIonRouter();

  if (to.name === 'auth-login' && from.name === null) { 
    // Allow direct navigation to the login page without interference
    return;
  }

  if (to.name.includes('auth') && token) {
    return router.push('/');
  }

  if (!to.name.includes('auth') && !token) {
    return router.push('/auth/login');
  }
});