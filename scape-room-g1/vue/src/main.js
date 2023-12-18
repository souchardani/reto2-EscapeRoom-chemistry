import { createApp } from "vue";
import App from "./App.vue";
//vue store with vuex
import store from "./store";
//vue router
import router from "./router";

createApp(App).use(store).use(router).mount("#app");
