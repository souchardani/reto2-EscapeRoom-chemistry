import { createApp } from "vue";

import { createPinia } from 'pinia';

import App from "./App.vue";
import "./index.css";
import store from "./store";
import router from "./router";


const pinia = createPinia();
createApp(App).use(pinia).use(store).use(router).mount("#app");


