import { createApp } from "vue";
import { createPinia } from 'pinia';
import App from "./App.vue";
import "./index.css";
// Vue store with Vuex
import store from "./store";
// Vue router
import router from "./router";

// Crear una instancia de Pinia
const pinia = createPinia();

// Crear la aplicación y usar Pinia
createApp(App)
  .use(pinia)  // Usar Pinia en lugar de VueX store
  .use(store)
  .use(router)
  .mount("#app");

