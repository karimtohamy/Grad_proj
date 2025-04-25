import type { CapacitorConfig } from "@capacitor/cli";

const config: CapacitorConfig = {
  appId: "io.ionic.Manzely",
  appName: "Manzely",
  webDir: "dist",
  server: {
    androidScheme: "http",
  },
  plugins: {
    SplashScreen: {
      launchShowDuration: 500,
      launchAutoHide: true,
      launchFadeOutDuration: 300,
      backgroundColor: "#eff6e0",
      androidSplashResourceName: "splash",
      androidScaleType: "CENTER_CROP",
      showSpinner: true,
      androidSpinnerStyle: "large",
      iosSpinnerStyle: "small",
      spinnerColor: "#999999",
      splashFullScreen: true,
      splashImmersive: true,
      layoutName: "launch_screen",
      useDialog: true,
      alwaysShowSplash: true, // Ensure splash screen is always displayed
    },
    StatusBar: {
      overlaysWebView: false,
    },
  },
};

export default config;
