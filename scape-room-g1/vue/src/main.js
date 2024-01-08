import { createApp } from "vue";
import {createPinia} from "pinia";
const Pinia = createPinia()
import App from "./App.vue";
import "./index.css";
//vue store with vuex
import store from "./store";
//vue router
import router from "./router";

createApp(App).use(store).use(Pinia).use(router).mount("#app");
